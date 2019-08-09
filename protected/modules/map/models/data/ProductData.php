<?php
/**
 * 商品数据操作类.
 *
 * @author tong<tonganping@camera360.com>
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace app\modules\api\models\data;

use app\modules\api\models\dao\ProductAR;

/**
 * Class ConfigData
 * 配置相关的数据操作
 * @package app\modules\api\models\data
 */
class ProductData
{
    /**
     * @var ProductAR $pdDao
     */
    private $pdDao;

    /**
     * @return ProductAR
     */
    public function getPdDao(): ProductAR
    {
        if (empty($this->pdDao)) {
            $this->pdDao = new ProductAR();
        }
        return $this->pdDao;
    }

    /**
     * @param array $product
     *
     * @return ProductAR
     */
    public function genPdDao(array $product) : ProductAR
    {
        $this->pdDao = new ProductAR($product);
        return $this->pdDao;
    }

    /**
     * @param ProductAR $pdDao
     */
    public function setPdDao(ProductAR $pdDao): void
    {
        $this->pdDao = $pdDao;
    }

    /**
     * @param array $cond
     * @param array $sort
     * @param int   $skip
     * @param int   $limit
     *
     * @return array
     */
    public function getList(array $cond, array $sort = ['_id' => -1], $skip = 0, $limit = 20) : array
    {
        $returnList  = array();
        $productList = $this->getPdDao()->find()->where($cond)->orderBy($sort)->offset($skip)->limit($limit)->asArray()->all();
        foreach ($productList as $key => $product) {
            $returnList[$key] = $this->formatProduct($product);
        }
        return $returnList;
    }

    /**
     * @param array $cond
     *
     * @return int
     * @throws \yii\mongodb\Exception
     */
    public function getTotal(array $cond) : int
    {
        return  $this->getPdDao()->find()->where($cond)->count();
    }

    /**
     * @param array $params
     *
     * @return array|null
     */
    public function getOne(array $params) : array
    {
        $product = $this->getPdDao()->find()->where($params)->asArray()->one();
        if (!empty($product)) {
            $product = $this->formatProduct($product);
        }

        return $product ? $product : [];
    }

    /**
     * @param array $productArray
     *
     * @return array
     */
    protected function formatProduct(array $productArray) : array
    {
        return [
            'id'            => strval($productArray['_id']),
            'name'          => $productArray['name'],
            'price'         => floatval($productArray['price']),
            'createTime'    => $productArray['createTime'],
            'updateTime'    => $productArray['updateTime'],
            'status'        => $productArray['status'],
        ];
    }


    /**
     * @param array $cond
     *
     * @return bool
     */
    public function findAndModifyModelByName(array $cond) : bool
    {
        $pdModel = $this->getProductModelOne([
            'name' => $cond['name']
        ]);
        if ($pdModel) {
            $pdModel->price = $cond['price'];
            $pdModel->updateTime = microtime(true);
            return $pdModel->save();
        } else {
            return $this->saveProduct($cond);
        }
    }

    /**
     * @param array $params
     *
     * @return ProductAR|null|\yii\mongodb\ActiveRecord
     */
    public function getProductModelOne(array $params)
    {
        return $this->getPdDao()->find()->where($params)->one();
    }

    /**
     * @param array $product
     *
     * @return bool
     */
    public function saveProduct(array $product) : bool
    {
        return $this->genPdDao($product)->save();
    }

    /**
     * @param array $condition
     *
     * @return int
     */
    public function del(array $condition) : int
    {
        return $this->getPdDao()->deleteAll($condition);
    }
}
