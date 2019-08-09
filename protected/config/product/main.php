<?php
$GLOBALS['mongo_servers'] = [
    'server'     => 'mongodb://127.0.0.1',
    'replicaSet' => null,
];


$config = \yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../base.php',
    [
        'components' => [
            'mongodb' => [
                'class' => '\yii\mongodb\Connection',
                'dsn' => "mongodb://cn-office-platform-dev-all.c360in.com.novalocal:27017,cn-office-platform-dev-all.c360in.com.novalocal:28011,cn-office-platform-dev-all.c360in.com.novalocal:28012/bmall?replicaSet=rs0&readPreference=primaryPreferred"
            ],
        ],
        'params' => [
            'userCenterHost' => 'http://cn-i-inner.camera360.com', //用户中心
        ]
    ]
);

return $config;
