<?php
// ini_set('display_errors', 'off');
error_reporting(E_ERROR | E_PARSE); // E_WARNING

// Define
define('DIR_ROOT', __DIR__ . '/');
define('DIR_LOG', DIR_ROOT . '../logs/');

// Auto Load
function load_class($class){
    include $class.'.php';
}
spl_autoload_register('load_class');

/**
 * 日志
 * @param  mixed $vars 日志内容，可变长度参数
 */
function logs(...$vars){
    $contents = array_map(function($var){
        if(!is_string($var)){
            return print_r($var, true);
        }else{
            return $var;
        }
    }, $vars);

    $dir_log = defined('DIR_LOG') ? DIR_LOG : __DIR__ . '/logs/';
    if(!is_dir($dir_log)){
        mkdir($dir_log, 0777, true);
        chmod($dir_log, 0777);
    }

    $filename = date('Y-m-d') . '.log';
    $format = "# %s - %s\r\n";

    file_put_contents($dir_log . $filename, sprintf($format, date('Y-m-d H:i:s'), implode("\r\n", $contents)), FILE_APPEND);
}