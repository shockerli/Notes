<?php

//两个Crontab解析类

class CrontabParse {

    /**
     *  Finds next execution time(stamp) parsin crontab syntax,
     *  after given starting timestamp (or current time if ommited)
     *
     * @param string $_cron_string :
     *
     *      0     1    2    3    4
     *      *     *    *    *    *
     *      -     -    -    -    -
     *      |     |    |    |    |
     *      |     |    |    |    +----- day of week (0 - 6) (Sunday=0)
     *      |     |    |    +------- month (1 - 12)
     *      |     |    +--------- day of month (1 - 31)
     *      |     +----------- hour (0 - 23)
     *      +------------- min (0 - 59)
     * @param int $_after_timestamp timestamp [default=current timestamp]
     * @return int unix timestamp - next execution time will be greater
     *              than given timestamp (defaults to the current timestamp)
     * @throws \InvalidArgumentException
     */
    public static function parse($_cron_string, $_after_timestamp = null) {
        if (!preg_match('/^((\*(\/[0-9]+)?)|[0-9\-\,\/]+)\s+((\*(\/[0-9]+)?)|[0-9\-\,\/]+)\s+((\*(\/[0-9]+)?)|[0-9\-\,\/]+)\s+((\*(\/[0-9]+)?)|[0-9\-\,\/]+)\s+((\*(\/[0-9]+)?)|[0-9\-\,\/]+)$/i', trim($_cron_string))) {
            throw new \InvalidArgumentException("Invalid cron string: " . $_cron_string);
        }
        if ($_after_timestamp && !is_numeric($_after_timestamp)) {
            throw new \InvalidArgumentException("\$_after_timestamp must be a valid unix timestamp ($_after_timestamp given)");
        }
        $cron = preg_split("/[\s]+/i", trim($_cron_string));
        $start = empty($_after_timestamp) ? time() : $_after_timestamp;
        $date = array('minutes' => self::_parseCronNumbers($cron[0], 0, 59),
            'hours' => self::_parseCronNumbers($cron[1], 0, 23),
            'dom' => self::_parseCronNumbers($cron[2], 1, 31),
            'month' => self::_parseCronNumbers($cron[3], 1, 12),
            'dow' => self::_parseCronNumbers($cron[4], 0, 6),
        );
        // limited to time()+366 - no need to check more than 1year ahead
        for ($i = 0; $i <= 60 * 60 * 24 * 366; $i += 60) {
            if (in_array(intval(date('j', $start + $i)), $date['dom']) &&
                    in_array(intval(date('n', $start + $i)), $date['month']) &&
                    in_array(intval(date('w', $start + $i)), $date['dow']) &&
                    in_array(intval(date('G', $start + $i)), $date['hours']) &&
                    in_array(intval(date('i', $start + $i)), $date['minutes'])
            ) {
                return $start + $i;
            }
        }
        return null;
    }

    /**
     * get a single cron style notation and parse it into numeric value
     *
     * @param string $s cron string element
     * @param int $min minimum possible value
     * @param int $max maximum possible value
     * @return int parsed number
     */
    protected static function _parseCronNumbers($s, $min, $max) {
        $result = array();
        $v = explode(',', $s);
        foreach ($v as $vv) {
            $vvv = explode('/', $vv);
            $step = empty($vvv[1]) ? 1 : $vvv[1];
            $vvvv = explode('-', $vvv[0]);
            $_min = count($vvvv) == 2 ? $vvvv[0] : ($vvv[0] == '*' ? $min : $vvv[0]);
            $_max = count($vvvv) == 2 ? $vvvv[1] : ($vvv[0] == '*' ? $max : $vvv[0]);
            for ($i = $_min; $i <= $_max; $i += $step) {
                $result[$i] = intval($i);
            }
        }
        ksort($result);
        return $result;
    }

}

class XwCrontab {

    /**
     * 检查某时间($time)是否符合某个corntab时间计划($str_cron)
     *
     * @param int    $time     时间戳
     * @param string $str_cron corntab的时间计划，如，"30 2 * * 1-5"
     *
     * @return bool/string 出错返回string（错误信息）
     */
    static public function check($time, $str_cron) {
        $format_time = self::format_timestamp($time);
        $format_cron = self::format_crontab($str_cron);
        if (!is_array($format_cron)) {
            return $format_cron;
        }
        return self::format_check($format_time, $format_cron);
    }

    /**
     * 使用格式化的数据检查某时间($format_time)是否符合某个corntab时间计划($format_cron)
     *
     * @param array $format_time self::format_timestamp()格式化时间戳得到
     * @param array $format_cron self::format_crontab()格式化的时间计划
     *
     * @return bool
     */
    static public function format_check(array $format_time, array $format_cron) {
        return (!$format_cron[0] || in_array($format_time[0], $format_cron[0])) && (!$format_cron[1] || in_array($format_time[1], $format_cron[1])) && (!$format_cron[2] || in_array($format_time[2], $format_cron[2])) && (!$format_cron[3] || in_array($format_time[3], $format_cron[3])) && (!$format_cron[4] || in_array($format_time[4], $format_cron[4]))
        ;
    }

    /**
     * 格式化时间戳，以便比较
     *
     * @param int $time 时间戳
     *
     * @return array
     */
    static public function format_timestamp($time) {
        return explode('-', date('i-G-j-n-w', $time));
    }

    /**
     * 格式化crontab时间设置字符串,用于比较
     *
     * @param string $str_cron crontab的时间计划字符串，如"15 3 * * *"
     *
     * @return array/string 正确返回数组，出错返回字符串（错误信息）
     */
    static public function format_crontab($str_cron) {
        //格式检查
        $str_cron = trim($str_cron);
        $reg = '#^((\*(/\d+)?|((\d+(-\d+)?)(?3)?)(,(?4))*))( (?2)){4}$#';
        if (!preg_match($reg, $str_cron)) {
            return '格式错误';
        }

        try {
            //分别解析分、时、日、月、周
            $arr_cron = array();
            $parts = explode(' ', $str_cron);
            $arr_cron[0] = self::parse_cron_part($parts[0], 0, 59); //分
            $arr_cron[1] = self::parse_cron_part($parts[1], 0, 59); //时
            $arr_cron[2] = self::parse_cron_part($parts[2], 1, 31); //日
            $arr_cron[3] = self::parse_cron_part($parts[3], 1, 12); //月
            $arr_cron[4] = self::parse_cron_part($parts[4], 0, 6); //周（0周日）
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return $arr_cron;
    }

    /**
     * 解析crontab时间计划里一个部分(分、时、日、月、周)的取值列表
     * @param string $part  时间计划里的一个部分，被空格分隔后的一个部分
     * @param int    $f_min 此部分的最小取值
     * @param int    $f_max 此部分的最大取值
     *
     * @return array 若为空数组则表示可任意取值
     * @throws Exception
     */
    static protected function parse_cron_part($part, $f_min, $f_max) {
        $list = array();

        //处理"," -- 列表
        if (false !== strpos($part, ',')) {
            $arr = explode(',', $part);
            foreach ($arr as $v) {
                $tmp = self::parse_cron_part($v, $f_min, $f_max);
                $list = array_merge($list, $tmp);
            }
            return $list;
        }

        //处理"/" -- 间隔
        $tmp = explode('/', $part);
        $part = $tmp[0];
        $step = isset($tmp[1]) ? $tmp[1] : 1;

        //处理"-" -- 范围
        if (false !== strpos($part, '-')) {
            list($min, $max) = explode('-', $part);
            if ($min > $max) {
                throw new Exception('使用"-"设置范围时，左不能大于右');
            }
        } elseif ('*' == $part) {
            $min = $f_min;
            $max = $f_max;
        } else {//数字
            $min = $max = $part;
        }

        //空数组表示可以任意值
        if ($min == $f_min && $max == $f_max && $step == 1) {
            return $list;
        }

        //越界判断
        if ($min < $f_min || $max > $f_max) {
            throw new Exception('数值越界。应该：分0-59，时0-59，日1-31，月1-12，周0-6');
        }

        return $max - $min > $step ? range($min, $max, $step) : array((int) $min);
    }

}
