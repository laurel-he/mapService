<?php
// defined('YII_DEBUG') or define('YII_DEBUG', true);
require  __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
require(__DIR__ . '/../protected/config/mode.php');
require __DIR__ . '/../vendor/autoload.php';

//使用新mongodb扩展生成ID，不然内部使用老MongoId会报错
isset($_SERVER['LOG_ID']) || $_SERVER['LOG_ID'] = strval(new \MongoDB\BSON\ObjectID());
\kzc\log\LogHelper::init();

$config = require __DIR__ . '/../protected/config/' . strtolower(APPLICATION_ENV) . '/main.php';
(new yii\web\Application($config))->run();
