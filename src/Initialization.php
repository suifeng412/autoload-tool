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
        define('AUTOLOAD_TOOL_ROOT_PATH', $rootPath);
        $loader = new Loader();
        $loader->register();
    }


}