<?php
/**
 * @author: hexiaojiao@jiapinai.com
 * @todo:
 * time: 2019-08-10 11:23
 */

namespace app\modules\map\models\logic;

use app\modules\map\models\data\MapData;
use app\modules\map\models\dao\MapAR;
use yii\base\Model;

/**
 *
 * Class MapLogic
 * @package app\modules\api\models\logic
 */
class MapLogic extends Model
{
    /**
     * @var object MapData
     */
    private $mapData;
    public function getMapData(): MapData
    {
        if (empty($this->mapData)) {
            $this->mapData = new MapData();
        }
        return $this->mapData;
    }

    /**
     * @param $data
     * @return bool
     * @throws \Exception
     */
    public function saveMap($data)
    {
        $check = $this->checkInArr($data, ['name', 'tel', 'addr', 'desc', 'point', 'type']);
        if ($check) {
            return $this->getMapData()->saveMap($data);
        } else {
            throw new \Exception('缺乏必要参数');
        }
    }

    /**
     * @param $data
     * @throws \Exception
     */
    public function delPoint($data)
    {
        try {
            $this->getMapData()->delPoint($data);
        } catch (\Exception $e) {
            throw new \Exception('参数错误');
        }
    }

    /**
     * @param $data
     * @return false|int
     * @throws \Exception
     */
    public function changeLogo($data)
    {
        try {
            return $this->getMapData()->changeLogo($data);
        } catch (\Exception $e) {
            throw new \Exception('参数错误');
        }
    }

    public function allStatus()
    {
        return MapAR::ICON_STATUS;
    }

    /**
     * @param $typeDate
     * @return array|\yii\mongodb\ActiveRecord
     */
    public function showPoint($typeDate)
    {
        return $this->getMapData()->findPoint($typeDate);
    }

    /**
     * 检查必填项是否全部填写
     * @param $req
     * @param $arr
     * @return bool
     */
    private function checkInArr($req, $arr)
    {
        foreach ($arr as $v) {
            if (array_key_exists($v, $req)) {
                continue;
            } else {
                return false;
            }
        }
        return true;
    }
}
