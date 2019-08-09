<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2018/5/24
 * Time: 15:44
 */


namespace app\modules\api\tests\api;


use Codeception\Util\HttpCode;
use kzc\log\UnitTestLogger;

class ProductCest
{
    protected $param = [
        'name' => 'Camera360',
    ];

    public function _before(\ApiTester $I)
    {
        UnitTestLogger::setup();
    }

    public function _after(\ApiTester $I)
    {
    }


    /**
     * @param \ApiTester $I
     */
    public function tryListStart(\ApiTester $I)
    {
        $I->info("开始测试 list API");
        $I->wantTo('step1 开始测试 list API');

        $I->sendPOST('api/product/list', $this->param);
        $I->seeResponseCodeIs(HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['status' => '200']);
        $I->seeResponseMatchesJsonType(['status' => "integer"]);
        $I->seeResponseMatchesJsonType(['data' => "array"]);
        $response = json_decode($I->grabResponse(), true);
    }


    /**
     * @param \ApiTester $I
     */
    public function tryOneStart(\ApiTester $I)
    {
        $I->info("开始测试 one API");
        $I->wantTo('step1 开始测试 one API');

        $I->sendPOST('api/product/one', $this->param);
        $I->seeResponseCodeIs(HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['status' => '200']);
        $I->seeResponseMatchesJsonType(['status' => "integer"]);
        $I->seeResponseMatchesJsonType(['data' => "array"]);
        $response = json_decode($I->grabResponse(), true);
    }

}