<?php

namespace Ch4\Tests;

use Ch4\Src\WebServiceInterface;

class FakeWebService implements WebServiceInterface
{
    public $message;

    public function logError(string $message)
    {
        $this->message = $message;
    }
}