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
                'dsn' => "mongodb://notice_service:NoticeService666666!@dds-bp142a55068339041.mongodb.rds.aliyuncs.com:3717,dds-bp142a55068339042.mongodb.rds.aliyuncs.com:3717/notice_service?replicaSet=mgset-11647509"
            ],
        ],
        'params' => [
            'userCenterHost' => 'http://cn-i-inner.camera360.com', //用户中心
        ]
    ]
);

return $config;
