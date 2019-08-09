<?php
/**
 * 商品信息模型
 *
 * @author tonganping<tonganping@camera360.com>
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */
namespace app\modules\api\models\dao;

use yii\mongodb\ActiveRecord;

/**
 * 商品信息表
 * @property string  name           商品名
 * @property float   price          价格
 * @property float   createTime    创建时间
 * @property float   updateTime    更新时间
 * @property integer status         售卖状态
 *
 * Class DataBaseAR
 * @package app\modules\api\models\dao
 */
class ProductAR extends ActiveRecord
{
    /**
     *  @var  int STATUS_DRAFT  添加草稿状态.
     */
    const STATUS_DRAFT  = 1;

    /**
     *  @var  int STATUS_ONSALE  在售状态.
     */
    const STATUS_ONSALE = 2;

    /**
     *  @var  int STATUS_DEL  删除状态.
     */
    const STATUS_DEL    = 3;

    public function attributes()
    {
        return [
            '_id',
            'name',
            'price',
            'createTime',
            'updateTime',
            'status',
        ];
    }
}
