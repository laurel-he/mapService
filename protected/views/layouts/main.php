<?php
/**
 * @author: hexiaojiao@jiapinai.com
 * @todo:
 * time: 2019-08-09 17:01
 */

use yii\helpers\Html;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <script>
        window.HOST_TYPE = "2";
    </script>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?=$this->registerJsFile("@web/static/js/jquery.min.js"); ?>
    <script src="https://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <?php $this->head() ?>

    <style>
        /* ---------------------------------------- */
        /*  P R E L O A D I N G   S T Y L E
        /* ---------------------------------------- */
        .mask-color {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 99999999;
        }

        .mask-color-port {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 99999999;
            background: rgba(255, 255, 255, .6);
            display: none;
        }

        #preview-area {
            width: 60px;
            height: 60px;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 60px;
            right: 0;
            margin: auto auto;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .spinner {
            margin: 0 auto;
            width: 40px;
            height: 40px;
            position: relative;
            text-align: center;
            -webkit-animation: rotate-pin 2.0s infinite linear;
            animation: rotate-pin 2.0s infinite linear;
        }

        .dot1,
        .dot2 {
            width: 60%;
            height: 60%;
            display: inline-block;
            position: absolute;
            top: 0;
            background-color: #1DA57A;
            border-radius: 100%;
            -webkit-animation: bounce-pin 2.0s infinite ease-in-out;
            animation: bounce-pin 2.0s infinite ease-in-out;
        }

        .dot2 {
            top: auto;
            bottom: 0px;
            -webkit-animation-delay: -1.0s;
            animation-delay: -1.0s;
        }

        @-webkit-keyframes rotate-pin {
            100% {
                -webkit-transform: rotate(360deg)
            }
        }

        @keyframes rotate {
            100% {
                transform: rotate(360deg)
            }
        }

        @-webkit-keyframes bounce-pin {

            0%,
            100% {
                -webkit-transform: scale(0.0)
            }

            50% {
                -webkit-transform: scale(1.0)
            }
        }

        @keyframes bounce-pin {

            0%,
            100% {
                transform: scale(0.0)
            }

            50% {
                transform: scale(1.0)
            }
        }

    </style>
</head>

<body>
    <link href="https://cdn.bootcss.com/font-awesome/5.7.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/twitter-bootstrap/4.2.1/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/twitter-bootstrap/4.2.1/css/bootstrap-reboot.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/twitter-bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/3.3.0/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/blueimp-md5/2.10.0/js/md5.min.js"></script>
    <script src="https://cdn.bootcss.com/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.bootcss.com/twitter-bootstrap/4.2.1/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.bootcss.com/highlight.js/9.12.0/styles/tomorrow-night-blue.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="https://cdn.bootcss.com/highlight.js/9.12.0/languages/json.min.js"></script>
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
