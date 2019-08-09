<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use kzc\log\UnitTestLogger;

class Unit extends \Codeception\Module
{
    /**
     * @group ignore
     * @param mixed $info
     */
    public function info($info): void {
        UnitTestLogger::print($info);
    }

    /**
     * @group ignore
     * @param string $info
     */
    public function error($info): void {
        UnitTestLogger::print($info);
    }
}
