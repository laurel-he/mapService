<?php
/**
 * 业务控制器基类
 * @author tong<tonganping@jiapinai.com>
 */
namespace app\components;

use kzc\yii\JpController;

/**
 * @apiDefine ApiParamComm 公共参数定义
 * @apiParam {String} appName 应用名，如：Camera360
 * @apiParam {String} sig 签名，如：6fa03aca724685e05df9adad8b5fe68c
 */
class Controller extends JpController
{

    protected function checkCookie(): bool
    {
        // 暂时忽略权限检查
        return parent::checkCookie();
    }
}
