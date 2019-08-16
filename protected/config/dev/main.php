<?php
$config = \yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../base.php',
    [
        'components' => [
            'mongodb' => [
                'class' => '\yii\mongodb\Connection',
                'dsn' => "mongodb://127.0.0.1:27017/map"
            ],
        ],
        'params'     => [
        ],
    ]
);

return $config;
