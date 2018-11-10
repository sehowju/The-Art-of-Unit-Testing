<?php

namespace Ch5\Tests;

use Ch5\Src\LoggerInterface;

class FakeLogger implements LoggerInterface
{
    public $lastError;
    public function LogError(string $message):void
    {
        $this->lastError = $message;
    }
}