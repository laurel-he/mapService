<?php

namespace app\modules\map;

use yii\helpers\ArrayHelper;

class ApiModule extends \yii\base\Module
{
    public function __construct($id, $parent = null, $config = [])
    {
        $env = strtolower(APPLICATION_ENV);
        !defined('MODULE_NAME') && define('MODULE_NAME', $id);

        if (defined('TEST')) {
            // 单测模式
            $configPath = __DIR__ . "/config/{$env}/test.php";
        } elseif (\Yii::$app instanceof \yii\console\Application) {
            // Console模式
            $this->controllerNamespace = "app\\modules\\{$id}\\consoles";
            $configPath                = __DIR__ . "/config/{$env}/console.php";
        } else {
            // Web模式
            $configPath = __DIR__ . "/config/{$env}/main.php";
        }

        if (!is_readable($configPath)) {
            throw new \yii\web\HttpException(405, "$configPath is not readalbe");
        }

        /**
         * 从Yii1升级到Yii2后，模块配置被独立出来，不再与应用配置合并，因此读取配置的方法也要改变，
         * 例如：Yii::$app->getModule(MODULE_NAME)->params['xxx']
         */
        parent::__construct($id, $parent, ArrayHelper::merge($config, require($configPath)));
    }
}
