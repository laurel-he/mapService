<?php
/**
 * 业务控制器基类
 * @author tong<tonganping@jiapinai.com>
 */
namespace app\components;

use kzc\helpers\CookieHelper;
use kzc\log\LogHelper;
use kzc\yii\Errno;
use kzc\yii\JpController;
use yii\base\ExitException;
use yii\base\Module;

/**
 * @apiDefine ApiParamComm 公共参数定义
 * @apiParam {String} appName 应用名，如：Camera360
 * @apiParam {String} sig 签名，如：6fa03aca724685e05df9adad8b5fe68c
 */
class Controller extends JpController
{
    /**
     * @var CookieHelper
     */
    protected $cookie;

    /**
     * @param string $id the ID of this controller.
     * @param Module $module the module that this controller belongs to.
     * @param array $config name-value pairs that will be used to initialize the object properties.
     */
    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->cookie = new CookieHelper();
    }

    protected function checkIgnore(string $api): bool
    {
        $ignores = [];
        $api = $api[0] == '/' ? $api : '/'.$api;
        if (in_array($api, $ignores, true)) {
            return true;
        }
        return false;
    }

    /**
     * 检查cookie，做权限校验
     *
     * 1.验证用户是否登陆
     * 2.获取用户访问URI和权限列表，进行接口权限验证
     *
     * @return bool
     * @throws ExitException
     * @throws \ReflectionException
     * @throws \jiapin\base\ApiException
     * @throws \yii\base\InvalidConfigException
     */
    protected function checkCookie(): bool
    {
        if ($this->isDev()) {
            return true;
        }

        // 登录接口直接跳过
        $api          = \Yii::$app->getRequest()->getPathInfo();
        if ($this->checkIgnore($api)) {
            return true;
        }

        if (!$this->cookie->token()) {
            throw new ExitException(Errno::AUTH_NOT_LOGIN, "请登录");
        }

        //
        $cache = \Yii::$app->getCache();
        $cacheKey = $this->cookie->token().'-'.$api;
        if ($cache->get($cacheKey)) {
            return true;
        }
        return true;
    }
}
