<?php
define('APP_RUN_TIME', microtime(true));
mb_internal_encoding("UTF-8");
$hostname = getenv('environ') ?: gethostname();

if ('newdev' == $hostname || 'dev' == $hostname) {
    define('APPLICATION_ENV', 'dev');
    defined('YII_DEBUG') or define('YII_DEBUG', false);
}elseif ('product' == $hostname) {
    define('APPLICATION_ENV', 'product');
    defined('YII_DEBUG') or define('YII_DEBUG', false);
}elseif ('product-slave' == $hostname) {
    define('APPLICATION_ENV', 'product-slave');
}elseif ('qa' == $hostname) {
    define('APPLICATION_ENV', 'qa');
} else {
    define('APPLICATION_ENV', 'dev');
}