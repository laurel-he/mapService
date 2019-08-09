<?php
$config = \yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/main.php',
    [
        'enableCoreCommands' => false,
        'components' => [
            'log'          => [
                'flushInterval' => 1,
                'targets'       => [
                    'console'=> [
                        'class'          => '\kzc\yii\ConsoleTarget',
                        'levels'         => ['error', 'warning', 'trace', 'info', 'notice'],
                        'displayDate'    => true,
                        'exportInterval' => 1,
                        'displayCategory'=> false,
                    ],
                ],
            ],
        ],
    ]
);
unset($config['components']['request']);
unset($config['components']['errorHandler']);
return $config;
