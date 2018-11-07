<?php
/**
 * Created by PhpStorm.
 * Desc: 函数处理
 * User: 随风
 * Date: 2018/11/2
 * Time: 下午3:56
 */

namespace AutoloadTool;

class Functions{

    public static $functionsPath = [];

    // TODO deal functions

    public static function save(){
        !empty(self::$functionsPath) && file_put_contents('./autoloadTool_functions.json', json_encode(self::$functionsPath));
    }

    public static function get(){
        if(empty(self::$functionsPath) && file_exists('./autoloadTool_functions.json') && $jsonData = file_get_contents('./autoloadTool_functions.json'))
            self::$functionsPath = json_decode($jsonData??'', true);
        return self::$functionsPath;
    }

}