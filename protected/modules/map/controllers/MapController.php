<?php
/**
 * @author: hexiaojiao@jiapinai.com
 * @todo:
 * time: 2019-08-09 16:57
 */

namespace app\modules\map\controllers;

use app\components\Controller;
use app\modules\api\models\data\ProductForm;
use jiapin\base\ApiException;
use kzc\helpers\ResponseHelper;
use app\modules\api\models\logic\ProductLogic;

class MapController extends Controller
{
    public function actionIndex()
    {
        $data = [
            'appid' => '313123213'
        ];
        return $this->render('/map/map', $data);
    }
    public function actionPoint()
    {
        $data = [
            'appid' => '313123213'
        ];
        return $this->render('/map/point', $data);
    }
}
