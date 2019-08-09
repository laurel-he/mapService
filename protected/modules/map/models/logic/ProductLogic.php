<?php
/**
 * 商品逻辑操作类.
 *
 * @author tonganping<tonganping@camera360.com>
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */
namespace app\modules\api\models\logic;

use app\modules\api\models\dao\ProductAR;
use app\modules\api\models\data\ProductData;
use app\modules\api\models\data\ProductForm;
use jiapin\base\ApiException;
use yii\base\Model;

/**
 *
 * Class ProductLogic
 * @package app\modules\api\models\logic
 */
class ProductLogic extends Model
{
    /**
     * @var $pdForm ProductForm
     */
    private $pdForm;

    /**
     * @return ProductForm
     */
    public function getPdForm(): ProductForm
    {
        return $this->pdForm;
    }

    /**
     * @param ProductForm $pdForm
     */
    public function setPdForm(ProductForm $pdForm): void
    {
        $this->pdForm = $pdForm;
    }

    /**
     * @var ProductData $productData
     */
    private $productData;

    /**
     * @return ProductData
     */
    public function getProductData(): ProductData
    {
        if (empty($this->productData)) {
            $this->productData = new ProductData();
        }
        return $this->productData;
    }

    /**
     * @param ProductData $productData
     */
    public function setProductData(ProductData $productData): void
    {
        $this->productData = $productData;
    }



    /**
     * @return array
     * @throws \yii\mongodb\Exception
     */
    public function getList() : array
    {
        return [
            'list' => $this->getProductData()->getList($this->getPdForm()->getSearchCond(), $this->getPdForm()->getSort(), $this->getPdForm()->getSkip(), $this->getPdForm()->getLimit()),
            'sumTotal' => $this->getProductData()->getTotal($this->getPdForm()->getSearchCond())
        ];
    }

    /**
     * @return array
     * @throws ApiException
     */
    public function getOne() : array
    {
        if (empty($this->getPdForm()->getName()) && empty($this->getPdForm()->getId())) {
            throw  new ApiException('搜索条件不能为空!', 10010);
        }

        return $this->getProductData()->getOne($this->getPdForm()->getSearchCond());
    }

    /**
     * @return array
     * @throws ApiException
     */
    protected function genProductInfoByForm() : array
    {
        $product = [
            'name' => $this->getPdForm()->getName(),
            'price' => $this->getPdForm()->getPrice(),
            'createTime' => microtime(true),
            'updateTime' => microtime(true),
            'status' => ProductAR::STATUS_DRAFT
        ];
        foreach ($product as $key => $val) {
            if (empty($val)) {
                throw  new ApiException('params ['.$key.'] is  empty! ', 10010);
            }
        }
        return $product;
    }

    /**
     * @return bool
     * @throws ApiException
     */
    public function save() : bool
    {
        return $this->getProductData()->findAndModifyModelByName($this->genProductInfoByForm());
    }

    /**
     * @return int
     * @throws ApiException
     */
    public function del() : int
    {
        if (empty($this->getPdForm()->getId())) {
            throw new  ApiException('params id is error!', 10011);
        }
        return $this->getProductData()->del([
            '_id' => new \MongoDB\BSON\ObjectId($this->getPdForm()->getId())
        ]);
    }
}
