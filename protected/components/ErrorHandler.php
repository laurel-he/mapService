<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2018/4/26
 * Time: 09:32
 */

namespace app\components;

class ErrorHandler extends \yii\web\ErrorHandler
{

    protected function renderException($exception)
    {
        $resp = \Yii::$app->runAction($this->errorAction ?: 'site/error');
        \Yii::$app->response->data = $resp;
        \Yii::$app->response->send();
    }
}
