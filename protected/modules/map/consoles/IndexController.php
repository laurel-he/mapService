<?php
/**
 * Created by PhpStorm.
 * User: tonganping
 * Time: 15:53
 */

namespace app\modules\api\consoles;

use app\components\Console;

class IndexController extends Console
{
    public function actionHelloWord()
    {
        echo 'Hello Word!',PHP_EOL;
        return true;
    }
}
