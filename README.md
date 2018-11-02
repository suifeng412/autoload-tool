# PHP自动加载类工具
  
  
  ## 简介
  完全兼容PSR-0和PSR-4规则的PHP类自动加载工具  
  
  
  ## 安装
  * composer安装
```
$ composer require suifeng412/autoload-tool
```
  
  
  ## 使用
```
// 设置配置
define('FORCE_GET_DIRS', 'true');  // 设置每次强制遍历目录

// 在index.php入口文件中引入autoload.php文件，在Initialization::init(__DIR__)方法
require __DIR__ . '/vendor/autoload.php';
\AutoloadTool\Initialization::init(__DIR__);
  
```
  
 