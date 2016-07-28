<?php
/**
 * Created by PhpStorm.
 * User: guodont
 * Date: 16/7/28
 * Time: 下午3:25
 */

namespace TransRush\Util;


class ArrayUtil
{
    public static function object_to_array($obj){
        $_arr = is_object($obj) ? get_object_vars($obj) :$obj;
        foreach ($_arr as $key=>$val){
            $val = (is_array($val) || is_object($val)) ? ArrayUtil::object_to_array($val):$val;
            $arr[$key] = $val;
        }
        return $arr;
    }
}