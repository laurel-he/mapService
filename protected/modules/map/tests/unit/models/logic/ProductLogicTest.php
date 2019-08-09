<?php
/**
 * Created by PhpStorm.
 * User: wangzhong
 * Date: 2017/8/16
 * Time: 19:34
 */

namespace app\modules\api\tests\unit\models\logic;

use app\modules\api\models\logic\ProductLogic;
use Codeception\Test\Unit;
use kzc\log\UnitTestLogger;

/**
 * Class ProductLogicTest
 * @package app\modules\api\tests\unit\models\logic
 */
class ProductLogicTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var string
     */
    protected static $bizNo = "";

    /**
     * @var string
     */
    protected static $userId = '1';

    /**
     *
     */
    protected function _before()
    {
        UnitTestLogger::setup();
    }

    /**
     *
     */
    protected function _after()
    {
    }

    /**
     * @throws \yii\mongodb\Exception
     */
    public function testGetHotByRules()
    {
        $this->tester->info("");
        $data = new ProductLogic();
        $list = $data->getList();
        self::assertTrue(is_array($list));
    }


}