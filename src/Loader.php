<?php
/**
 * Created by PhpStorm.
 * User: 随风
 * Desc: 自动加载函数类
 * Date: 2018/10/30
 * Time: 下午3:37
 */

namespace AutoloadTool;

class Loader{

    /**
     * 自动加载静态方法
     * @param $className
     */
    public static function autoload($className){
        $className = ltrim($className, '\\');
        $namespaceToPath = new NamespaceToPath();
        $data = $namespaceToPath->getNamespaceToDir();

        $prefixDirs = [];   // 命名空间首字母 => 命名空间 => 真实路径
        extract($data);

        $fileName = trim(substr($className, strrpos($className, '\\')), '\\').'.php';

        if (isset($prefixDirs[$className[0]])) {
            $subPath = $className;
            while (false !== $lastPos = strrpos($subPath, '\\')) {
                $subPath = substr($subPath, 0, $lastPos);
                $search = $subPath.'\\';

                if(isset($prefixDirs[$className[0]][$search]) && file_exists($prefixDirs[$className[0]][$search].'/'.$fileName)){
                    require $prefixDirs[$className[0]][$search].'/'.$fileName;
                    return ;
                }

            }
        }

    }

    public function register(){
        spl_autoload_register("self::autoload");
    }


}