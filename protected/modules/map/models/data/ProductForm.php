<?php
/**
 * 商品表单模型.
 *
 * @author huanghao<huanghao@camera360.com>
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace app\modules\api\models\data;

use yii\base\Model;

/**
 * Class ProductForm
 * 商品表单模型操作类
 * @package app\modules\api\models\data
 */
class ProductForm extends Model
{
    /**
     * @var $_id string
     */
    private $_id = '';

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->_id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->_id = $id;
    }

    /**
     * @var $status integer
     */
    private $status;

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @var $price float
     */
    private $price = 0.0;

    /**
     * @var $name string
     */
    private $name;


    /**
     * @var $sort array
     */
    private $sort = [
        '_id' => -1
    ];

    /**
     * @var int $skip
     */
    private $skip = 0;

    /**
     * @var int $limit
     */
    private $limit = 20;

    /**
     * @return string
     */
    public function getName():? string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        var_dump($name);
        $this->name = trim($name);
    }

    /**
     * @return array
     */
    public function getSort(): array
    {
        return $this->sort;
    }

    /**
     * @param array $sort
     */
    public function setSort(array $sort): void
    {
        $this->sort = $sort;
    }

    /**
     * @return int
     */
    public function getSkip(): int
    {
        return $this->skip;
    }

    /**
     * @param int $skip
     */
    public function setSkip(int $skip): void
    {
        $this->skip = intval($skip);
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     */
    public function setLimit(int $limit): void
    {
        $this->limit = intval($limit) == 0 ? 20 : intval($limit);
    }

    /**
     * @return array
     */
    public function getSearchCond() : array
    {
        $cond = array();
        if (!empty($this->getName())) {
            $cond['name'] = [
                '$regex' => $this->getName()
            ];
        }

        if (!empty($this->getId())) {
            $cond['_id'] = new \MongoDB\BSON\ObjectId($this->getId());
        }

        return $cond;
    }
}
