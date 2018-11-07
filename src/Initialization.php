<?php
/**
 * Created by PhpStorm.
 * User: 随风
 * Desc: 初始化文件
 * Date: 2018/10/30
 * Time: 下午3:28
 */

namespace AutoloadTool;

class Initialization{

    public static function init($rootPath){
        self::setConfig();
        define('AUTOLOAD_TOOL_ROOT_PATH', $rootPath);
        $loader = new Loader();
        $loader->register();
    }

    /**
     * 设置常量
     */
    public static function setConfig(){
        $config = include __DIR__.'/config/config.php';
        foreach ($config??[] as $k => $v){
            !defined(mb_strtoupper($k)) && define(mb_strtoupper($k), $v);
        }
    }


}