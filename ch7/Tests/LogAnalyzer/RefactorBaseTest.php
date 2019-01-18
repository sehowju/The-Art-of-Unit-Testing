<?php

namespace Ch7\Tests\LogAnalyzer;

use PHPUnit\Framework\TestCase;
use Ch7\Src\LogAnalyzer\LoggingFacility;
use Ch7\Src\LogAnalyzer\LoggerMemory;

abstract class RefactorBaseTest extends TestCase
{
    public function fakeTheLogger()
    {
        LoggingFacility::$logger = new LoggerMemory();
    }

    protected function tearDown()
    {
        LoggingFacility::$logger = null;
    }
}
