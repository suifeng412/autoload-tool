# PHP自动加载类工具
  
  
## 简介
  完全兼容PSR-0和PSR-4规则的PHP类自动加载工具  
  
  
## 安装
  * composer安装
```
$ composer require suifeng412/autoload-tool
```
  
  
## 使用
* 基本使用
```
// 设置配置
define('FORCE_GET_DIRS', 'true');       // 设置每次强制遍历目录
define('FUNCTION_DIR', 'functions');    

// 在index.php入口文件中引入autoload.php文件，在Initialization::init(__DIR__)方法
require __DIR__ . '/vendor/autoload.php';
\AutoloadTool\Initialization::init(__DIR__);
  
```
* 常量  
```
FORCE_GET_DIRS： true|false  // 设置每次是否强制遍历目录；默认为false
FUNCTION_DIR：functions  // 设置自动加载函数文件目录；默认自动加载functions目录下的函数文件
```
