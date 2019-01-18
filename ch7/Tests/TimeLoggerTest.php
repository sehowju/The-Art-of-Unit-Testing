<?php

namespace Ch7\Tests;

use PHPUnit\Framework\TestCase;
use Ch7\Src\TimeLogger;
use PHPUnit\Framework\MockObject\MockBuilder;
use phpmock\phpunit\PHPMock;

class TimeLoggerTest extends TestCase
{

    use \phpmock\phpunit\PHPMock;

    public function testCreateMessage()
    {
        $time = $this->getFunctionMock("Ch7\Src", "date");
        $time->expects($this->once())->willReturn("1970-01-01 00:00:00");

        $message = TimeLogger::createMessage("test");
        $this->assertContains("1970-01-01 00:00:00", $message);
    }

    // need install uopz by pecl
    public function testCreateMessageByDateTime()
    {
        if (!function_exists("uopz_set_return")) {
            $this->markTestSkipped();
        }
        uopz_set_return(
            \DateTime::class,
            "format",
            function ($str) {
                return "1970-01-01 00:00:00";
            },
            true
        );
        $message = TimeLogger::createMessageByDateTime("test");
        $this->assertContains("1970-01-01 00:00:00", $message);
    }
}
