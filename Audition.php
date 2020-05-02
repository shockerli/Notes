<?php

//快速排序
function quickSort($arr) {
    $len = count($arr);
    if ($len <= 1) {return $arr;}
    $v = $arr[0];
    $low = $up = array();
    for ($i = 1; $i < $len; ++$i) {
        if ($arr[$i] > $v) {
            $up[] = $arr[$i];
        } else {
            $low[] = $arr[$i];
        }
    }
    $low = quickSort($low);
    $up = quickSort($up);
    return array_merge($low, array($v), $up);
}

//冒泡排序
function getPao($arr) {
    $len = count($arr);
    for ($i = 1; $i <= $len - 1; ++$i) {
        for ($k = 0; $k < $len - $i; ++$k) {
            if ($arr[$k] > $arr[$k+1]) {
                list($arr[$k], $arr[$k+1]) = array($arr[$k+1], $arr[$k]);
            }
        }
    }
    return $arr;
}

//插入排序
function insert_sort($arr) {
    $len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        $tmp = $arr[$i];
        $j = $i - 1;
        while ($arr[$j] > $tmp) {
            $arr[$j+1] = $arr[$j];
            $arr[$j] = $tmp;
            $j--;
        }
    }
    return $arr;
}

//选择排序
function select_sort($arr) {
    $len = count($arr);
    for ($i = 0; $i < $len; $i++) {
        $k = $i;
        for ($j = $i + 1; $j < $len; $j++) {
            if ($arr[$k] > $arr[$j]) {
                $k = $j;
            }
            if ($k != $i) {
                $tmp = $arr[$i];
                $arr[$i] = $arr[$k];
                $arr[$k] = $tmp;
            }
        }
    }
    return $arr;
}

//二维数组排序
function array_sort($arr, $key, $order = 0) {
    $tmp = $new_arr = array();
    foreach ($arr as $k => $v) {
        $tmp[$k] = $v[$key];
    }
    if ($order == 0) {
        asort($tmp);
    } else {
        arsort($tmp);
    }
    foreach ($tmp as $k => $v) {
        $new_arr[$k] = $arr[$k];
    }
    return $new_arr;
}

//顺序查找
function seq_sch($arr, $k) {
    for ($i = 0, $len = count($arr); $i < $len; $i++) {
        if ($arr[$i] == $k) {
            break;
        }
    }
    return $i < $n ? $i : -1;
}

//二分查找/折半查找(数组需事先排序好)
function bin_search($arr, $low, $high, $k) {
    if ($low <= $high) {
        $mid = intval(($low + $high) / 2);
        if ($arr[$mid] == $k) {
            return $mid;
        } elseif ($k < $arr[$mid]) {
            return bin_search($arr, $low, $mid-1, $k);
        } else {
            return bin_search($arr, $mid+1, $high, $k);
        }
    }
    return false;
}

//二分查找-非递归
function bin_search($arr, $low, $high, $value) {
    while ($low <= $high) {
        $mid = floor(($low + $high) / 2);
        if ($value == $arr[$mid])
            return $mid;
        elseif ($value < $arr[$mid])
            $high = $mid-1;
        else
            $low = $mid+1;
    }
    return false;
}

//猴子问题
function king($n, $m) {
    $arr = range(1, $n);
    $i = 0;
    while (count($arr) > 1) {
        ++$i;
        $head = array_shift($arr);
        if ($i % $m != 0) {
            array_push($arr, $head);
        }
    }
    return $arr[0];
}

//无限极分类
function tree($arr, $pid = 0, $level = 0) {
    static $list = array();
    foreach ($arr as $key => $val) {
        if ($val['parent_id'] == $pid) {
            $val['level'] = $level;
            $list[] = $val;
            unset($arr[$key]);
            tree($arr, $val['cat_id'], $level+1);
        }
    }
    return $list;
}

//遍历文件夹
function sdir($dir) {
    $arr = array();
    if (is_dir($dir)) {
        if ($handle = opendir($dir)) {
            while ($file = readdir($handle) !== false) {
                if ($file != '.' && $file != '..') {
                    if (is_dir($dir . '/' . $file)) {
                        $arr[$file] = sdir($dir . '/' . $file);
                    } else {
                        $arr[] = $file;
                    }
                }
            }
            closedir($handle);
            return $arr;
        }
    }
}

//获取URL扩展名
pathinfo($url, PATHINFO_EXTENSION);

//多进程同时写入同一个文件
function writeFile($file, $content) {
    $fp = fopen($file, 'w+');
    if (flock($fp, LOCK_EX)) {
        fwrite($fp, $content);
        flock($fp, LOCK_UN);
    }
    fclose($fp);
}

//计算$p2相对$p1的路径
function relPath($p1, $p2) {
    $arr1 = explode('/', dirname($p1));
    $arr2 = explode('/', dirname($p2));
    //判断第几层目录不同
    for ($i = 0, $len = count($arr2); $i < $len; $i++) {
        if ($arr1[$i] != $arr2[$i]) {
            break;
        }
    }
    //注意：$i++与++$i的不同
    $i == 1 && $re = array();
    $i != 1 && $i < $len && $re = array_fill(0, $len-$i, '..');
    $i == $len && $re = array('./');
    $re = array_merge($re, array_slice($arr1, $i));
    return implode('/', $re);
}

//获取全路径脚本文件扩展名
$path = str_replace('\\', '/', __FILE__);
strrchr($path, '.');
substr($path, strrpos($path, '.'));
$p = pathinfo($path); $p['extension'];
$arr = explode('.', $path); $arr[count($arr)-1];
preg_replace('/^[^\.]+\.([\w]+)$/', '${1}', basename($path));

