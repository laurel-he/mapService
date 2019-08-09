<?php
$config = \yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../base.php',
    [
        'params' => [
            'useNoticeEnv'   => 'test',
        ],
    ]
);

return $config;
