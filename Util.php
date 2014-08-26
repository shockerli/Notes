<?php

/**
 * 工具函数类
 */

class Util {

    /**
     * 根据指定字段名整理多维数组
     *
     * @param array $data 需整理的多维数组
     * @param string $key 字段名
     * @param boolean $isCover 相同键值是否覆盖
     * @return array|boolean
     */
    static public function arrayChangeKey($data, $key, $isCover = false){
        if (!is_array($data) || is_string($key)){
            return false;
        }
        $result = array();
        foreach($data as $item){
            if($isCover){
                $result[$item[$key]][] = $item;
            }else{
                $result[$item[$key]] = $item;
            }
        }
        return $result;
    }

    /**
     * 递归的对多维数组按键名排序
     * @param array $data 需排序的数组
     * @param integer $sortFlags 排序方式
     * @return array
     */
    static public function arrayKsortRecursive($data, $sortFlags = SORT_STRING) {
        if (is_array($data)) {
            ksort($data, $sortFlags);
            foreach ($data AS $key => $val) {
                $data[$key] = self::arrayKsortRecursive($val, $sortFlags);
            }
        }
        return $data;
    }

}
