<?php
/**
 * Created by PhpStorm.
 * User: 随风
 * Desc: 命名空间与路径处理类
 * Date: 2018/10/30
 * Time: 下午3:31
 */

namespace AutoloadTool;

class NamespaceToPath{

    /**
     * 获取命名空间目录
     * @param $dir
     * @param string $path
     * @return array
     */
    public function getDirs($dir, $path=''){
        static $dirs = [];
        if(is_dir($dir) && $handle=opendir($dir)){
            $path && $dirs[$dir] = ltrim(str_replace(DIRECTORY_SEPARATOR, '\\', $path) . '\\', '\\');
            while($file=readdir($handle)){

                if($file=='.'||$file=='..'||$file=='.idea') continue;

                $checkPath = $dir.'/'.$file;

                $pattern = '/'.FUNCTION_DIR.'\/.*\.php/i';
                if(preg_match($pattern, $checkPath)){
                    Functions::$functionsPath[] = $checkPath;
                }

                if(is_dir($checkPath)){
                    $this->getDirs($checkPath, $path.'/'.$file);
                }
            }
        }

        return $dirs;
    }


    /**
     * 获取命名空间对应路径
     * @return array ['A' => ['AutoloadTool\' => '/var/www/html/AutoloadTool']]
     */
    public function getNamespaceToDir(){
        $data = [];
        !FORCE_GET_DIRS && file_exists('./autoloadTool_dirs.json') && $dirsJson = file_get_contents('./autoloadTool_dirs.json');
        $dirs = json_decode($dirsJson??'', true);

        // 初始化使用
        if(empty($dirs)){
            $dirs = $this->getDirs(AUTOLOAD_TOOL_ROOT_PATH);
            file_put_contents('./autoloadTool_dirs.json', json_encode($dirs));
            Functions::save();
        }

        foreach ($dirs??[] as $k => $dir){
            $data['prefixDirs'][$dir[0]][$dir] = $k;
        }
        return $data;
    }




}