<?php
/**
 * @author: hexiaojiao@jiapinai.com
 * @todo:
 * time: 2019-08-09 18:13
 */

namespace app\modules\map\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public$basePath
        = '@webroot';

    public$baseUrl
        = '@web'; //指定资源的根目录
    public $css = [
    ];
    public $js = [
        '/static/js/MarkerTool/MarkerTool.min.js'
    ];
//    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//    ];
}
