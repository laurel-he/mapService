<?php
!defined('APP_RUN_TIME') && define('APP_RUN_TIME', microtime(true));
!defined('SYSTEM_NAME') && define('SYSTEM_NAME', 'mapService');
!defined('WWW_DIR') && define('WWW_DIR', realpath(__DIR__ . '/../../..'));
!defined('RUNTIME_DIR') && define('RUNTIME_DIR', WWW_DIR . '/runtime/' . SYSTEM_NAME);
!is_dir(RUNTIME_DIR) && @mkdir(RUNTIME_DIR, 0777, true);

$config = [
    'id'               => SYSTEM_NAME,
    'name'             => SYSTEM_NAME,
    'basePath'         => realpath(__DIR__ . '/..'),
    'runtimePath'      => RUNTIME_DIR,
    'bootstrap'        => ['log'],
    'on beforeRequest' => ['\kzc\log\LogHelper', 'onBeforeRequest'],
    'on afterRequest'  => ['\kzc\log\LogHelper', 'onAfterRequest'],
    'modules'          => [
        'map' => ['class' => 'app\modules\map\ApiModule'],
    ],

    'components'       => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'request' => [
            'parsers' => [
                'application/json'       => 'yii\web\JsonParser',
            ],
            'enableCookieValidation' => false,
            'enableCsrfValidation' => false,
            'cookieValidationKey' => 'jiapin123!',
        ],

        'errorHandler' => [
            'class' => 'app\components\ErrorHandler',
            'errorAction' => 'index/error',
        ],

        'authManager'  => [
            'class' => 'yii\rbac\PhpManager',
        ],

        'urlManager'   => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
        ],

        'log'          => [
            'flushInterval' => 1,
            'targets' => [
                'error'   => [
                    'class'          => '\kzc\log\FileTarget',
                    'levels'         => ['error', 'warning'],
                    'logFile'        => '@runtime/error.log',
                    'exportInterval' => 1,
                    'enableRotation' => true,
                    'maxFileSize' => 50240,
                    'logVars'        => [],
                ],
                'info' => [
                    'class'          => '\kzc\log\FileTarget',
                    'levels'         => ['notice', 'trace' ,'info'],
                    'logFile'        => '@runtime/info.log',
                    'exportInterval' => 1,
                    'enableRotation' => true,
                    'maxFileSize' => 50240,
                    'except'         => ['yii\db\*', 'robot'],
                    'logVars'        => [],
                ],

            ],
        ],

    ],
];

return $config;
