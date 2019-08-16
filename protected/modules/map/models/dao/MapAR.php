<?php
/**
 * @author: hexiaojiao@jiapinai.com
 * @todo:
 * time: 2019-08-10 10:53
 */

namespace app\modules\map\models\dao;

use yii\mongodb\ActiveRecord;

/**
 * 地图信息表
 * @property string  _id           mongodb id
 * @property string  name          名称
 * @property string  tel           电话
 * @property string  addr          地址
 * @property string  desc          描述
 * @property string  point         标点信息
 * @property float   createTime    创建时间
 * @property float   updateTime    更新时间
 * @property integer type          标记类型
 *
 * Class MapAR
 * @package app\modules\map\models\dao
 */
class MapAR extends ActiveRecord
{
    const ICON_STATUS = [
        // 已到店指导
        [
            'name'    => 'HAS_GUIDE',
            'icon'    => 0,
            'chinese' => '已到店指导'
        ],

        // 需安排售后
        [
            'name'    => 'SHOULD_SET',
            'icon'    => 2,
            'chinese' => '需安排售后'
        ],

        // 已退货
        [
            'name'    => 'HAS_RETURNED',
            'icon'    => 16,
            'chinese' => '已退货'
        ],

        // 反应效果不好
        [
            'name'    => 'BAD_REQUEST',
            'icon'    => 8,
            'chinese' => '反应效果不好'
        ],


    ];
    public function attributes()
    {
        return [
            '_id',
            'name',
            'tel',
            'addr',
            'desc',
            'point',
            'createTime',
            'updateTime',
            'type',
        ];
    }
}
