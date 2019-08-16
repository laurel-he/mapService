<?php
/**
 * @author: hexiaojiao@jiapinai.com
 * @todo:
 * time: 2019-08-10 11:27
 */

namespace app\modules\map\models\data;

use app\modules\map\models\dao\MapAR;

class MapData
{
    /**
     * @var
     */
    private $mapDao;

    /**
     * @return MapAR
     */
    private function getMapDao()
    {
        if (empty($this->mapDao)) {
            $this->mapDao = new MapAR();
        }
        return $this->mapDao;
    }

    /**
     * @param $data
     * @return bool
     */
    public function saveMap($data)
    {
        $this->getMapDao()->name       = $data['name'];
        $this->getMapDao()->tel        = $data['tel'];
        $this->getMapDao()->addr       = $data['addr'];
        $this->getMapDao()->desc       = $data['desc'];
        $this->getMapDao()->point      = $data['point'];
        $this->getMapDao()->type       = $data['type'];
        $this->getMapDao()->createTime = time();
        $this->getMapDao()->updateTime = time();
        if ($this->getMapDao()->save()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $typeDate
     * @return array|\yii\mongodb\ActiveRecord
     */
    public function findPoint($typeDate)
    {
        $type = array_key_exists('type', $typeDate) ? $typeDate['type'] : false;
        if ($type === false) {
            $data = $this->getMapDao()->find()->all();
        } else {
            $data = $this->getMapDao()->find()->where(['type' => $typeDate['type']])->all();
        }
        return $data;
    }

    /**
     * @param $data
     * @return bool|int
     * @throws \yii\db\StaleObjectException
     */
    public function delPoint($data)
    {
        $dao = $this->getMapDao();
        if (array_key_exists('name', $data)) {
            $data = $dao::findOne(['name' => $data['name']])->delete();
        } else {
            $data = $dao::findOne(['_id' => $data['id']])->delete();
        }
        return $data;
    }

    /**
     * @param $data
     * @return false|int
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    public function changeLogo($data)
    {
        if (array_key_exists('id', $data)) {
            $res = MapAR::findOne(['_id' => $data['id']]);
        } else {
            $res= MapAR::findOne(['name' => $data['name']]);
        }
        $res->type = $data['type'];
        return $res->update();
    }
}
