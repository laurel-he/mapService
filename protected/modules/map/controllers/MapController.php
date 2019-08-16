<?php
/**
 * @author: hexiaojiao@jiapinai.com
 * @todo:
 * time: 2019-08-09 16:57
 */

namespace app\modules\map\controllers;

use app\components\Controller;
use Yii;
use app\modules\map\models\logic\MapLogic;
use kzc\helpers\ResponseHelper;

class MapController extends Controller
{
    private $logic;
    public function getMapLogic(): MapLogic
    {
        if (empty($this->logic)) {
            $this->logic = new MapLogic();
        }
        return $this->logic;
    }
    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $data = [
            'key' => '2b946d85884b3a5ce4805d82e7aac994'
        ];
        return $this->render('/map/point', $data);
    }

    /**
     * @return mixed
     */
    public function actionPoint()
    {
        $typeDate = array_merge(Yii::$app->request->get(), Yii::$app->request->post());
        $data = $this->getMapLogic()->showPoint($typeDate);
        return ResponseHelper::outputJson(['data' => $data]);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function actionSave()
    {
        $data = array_merge(Yii::$app->request->get(), Yii::$app->request->post());
        $res = $this->getMapLogic()->saveMap($data);
        return ResponseHelper::outputJson(['result' => $res]);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function actionDelete()
    {
        $data = array_merge(Yii::$app->request->get(), Yii::$app->request->post());
        $res = $this->getMapLogic()->delPoint($data);
        return ResponseHelper::outputJson(['result' => $res]);
    }

    public function actionGaode()
    {
        $data = [
            'key'  => '2b946d85884b3a5ce4805d82e7aac994',
        ];
        return $this->render('/map/gaode', $data);
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function actionLogo()
    {
        $data = array_merge(Yii::$app->request->get(), Yii::$app->request->post());
        $res = $this->getMapLogic()->changeLogo($data);
        return ResponseHelper::outputJson(['result' => $res]);
    }

    /**
     * @return array
     */
    public function actionStatus()
    {
        $res = $this->getMapLogic()->allStatus();
        return ResponseHelper::outputJson(['result' => $res]);
    }
}
