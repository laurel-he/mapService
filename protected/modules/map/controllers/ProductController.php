<?php
/**
 * 商品操控器.
 *
 * @author tonganping<tonganping@camera360.com>
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace app\modules\api\controllers;

use app\components\Controller;
use app\modules\api\models\data\ProductForm;
use jiapin\base\ApiException;
use kzc\helpers\ResponseHelper;
use app\modules\api\models\logic\ProductLogic;

class ProductController extends Controller
{
    /**
     *
     * @api              {post} /api/product/list 获取商品列表
     * @apiDescription   获取商品列表
     *
     * @apiSampleRequest /api/product/list
     * @apiName          ApiProductList
     * @apiParam         {String}   [name] 搜索商品名
     * @apiParam         {object}   [sort] 排序{"_id":-1}
     * @apiParam         {String}   [skip]  从多少个开始取
     * @apiParam         {String}   [limit] 每次取多少个
     * @apiGroup         demo/api/product
     * @apiVersion       0.1.0
     *
     * @apiSuccess {object[]} list 主健
     * @apiSuccess {string} list.name 商品名
     * @apiSuccess {string} list.price 价格
     * @apiSuccess {int}    list.status 查询结果
     * @apiSuccess {int}    sumTotal 总条数
     * @return array
     * @throws \yii\mongodb\Exception
     * @throws ApiException
     */
    public function actionList() : array
    {
        $request = array_merge(\Yii::$app->request->get(), \Yii::$app->request->post());

        try {
            $pdLogic = new ProductLogic([
                'pdForm' => new ProductForm($request)
            ]);
        } catch (\Exception $e) {
            throw  new ApiException('params is error['.substr($e->getMessage(), 0, 100).' ....]', 100300);
        }

        return ResponseHelper::outputJson($pdLogic->getList());
    }


    /**
     *
     * @api              {post} /api/product/one 获取商品列表
     * @apiDescription   获取商品列表
     *
     * @apiSampleRequest /api/product/one
     * @apiName          ApiProductOne
     * @apiParam         {String}   name 商品名
     * @apiParam         {String}   [id] 主健
     * @apiGroup         demo/api/product
     * @apiVersion       0.1.0
     *
     * @apiSuccess {Object} item 主健
     * @apiSuccess {string} item._id 主健
     * @apiSuccess {string} item.name 商品名
     * @apiSuccess {int}    item.price 价格
     * @apiSuccess {int}    item.status 查询结果
     * @return array
     * @throws \jiapin\base\ApiException
     */
    public function actionOne()
    {
        $request = array_merge(\Yii::$app->request->get(), \Yii::$app->request->post());

        try {
            $pdLogic = new ProductLogic([
                'pdForm' => new ProductForm($request)
            ]);
        } catch (\Exception $e) {
            throw  new ApiException('params is error['.substr($e->getMessage(), 0, 100).' ....]', 100300);
        }

        return ResponseHelper::outputJson([
            'item' => $pdLogic->getOne()
        ]);
    }


    /**
     *
     * @api              {post} /api/product/add 添加商品列表
     * @apiDescription   添加商品列表
     *
     * @apiSampleRequest /api/product/add
     * @apiName          ApiProductAdd
     * @apiParam         {String}   name    商品名
     * @apiParam         {String}   price   商品价格
     * @apiGroup         demo/api/product
     * @apiVersion       0.1.0
     *
     * @apiSuccess {bool} result 结果
     * @return array
     * @throws \jiapin\base\ApiException
     */
    public function actionSave()
    {
        $request = array_merge(\Yii::$app->request->get(), \Yii::$app->request->post());

        try {
            $pdLogic = new ProductLogic([
                'pdForm' => new ProductForm($request)
            ]);
        } catch (\Exception $e) {
            throw  new ApiException('params is error['.substr($e->getMessage(), 0, 100).' ....]', 100300);
        }

        return ResponseHelper::outputJson([
            'result' => $pdLogic->save()
        ]);
    }


    /**
     *
     * @api              {post} /api/product/del 删除商品列表
     * @apiDescription   删除商品列表
     *
     * @apiSampleRequest /api/product/del
     * @apiName          ApiProductDel
     * @apiParam         {String}   id    商品id
     * @apiGroup         demo/api/product
     * @apiVersion       0.1.0
     *
     * @apiSuccess {bool} result 结果
     * @return array
     * @throws \jiapin\base\ApiException
     */
    public function actionDel()
    {
        $request = array_merge(\Yii::$app->request->get(), \Yii::$app->request->post());

        try {
            $pdLogic = new ProductLogic([
                'pdForm' => new ProductForm($request)
            ]);
        } catch (\Exception $e) {
            throw  new ApiException('params is error['.substr($e->getMessage(), 0, 100).' ....]', 100300);
        }

        return ResponseHelper::outputJson([
            'result' => $pdLogic->del()
        ]);
    }
}
