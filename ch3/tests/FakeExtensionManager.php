<?php

namespace Ch3\Tests;

use Ch3\Src\ExtensionManagerInterface;

class FakeExtensionManager implements ExtensionManagerInterface
{
    public $willBeValid = false;
    public $willThrow = null;
    public function isValid(string $fileName): bool
    {
        if (!is_null($this->willThrow)) {
            throw $this->willThrow;
        }
        return $this->willBeValid;
    }
}