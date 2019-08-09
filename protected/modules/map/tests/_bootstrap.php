<?php
ini_set('display_errors', 1);
$BASE_DIR = __DIR__ . '/../../../..';
require "$BASE_DIR/vendor/yiisoft/yii2/Yii.php";
require "$BASE_DIR/protected/config/mode.php";
require "$BASE_DIR/vendor/autoload.php";

// 使用新mongodb扩展生成ID，不然内部使用老MongoId会报错
isset($_SERVER['LOG_ID']) || $_SERVER['LOG_ID'] = strval(new \MongoDB\BSON\ObjectID());
\kzc\log\LogHelper::init();

$config = require(__DIR__ . '/../../../config/' . strtolower(APPLICATION_ENV) . '/console.php');

$application = new yii\console\Application($config);


