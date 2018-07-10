<?php

namespace Ch4\Tests;

use Ch4\Src\WebServiceInterface;

class FakeWebServiceException implements WebServiceInterface
{
    public $lastError;
    public $toThrow;

    public function logError(string $message)
    {
        if (!is_null($this->toThrow)) {
            throw $this->toThrow;
        }
        $this->lastError = $message;
    }
}