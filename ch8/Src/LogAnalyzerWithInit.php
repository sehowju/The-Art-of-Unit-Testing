<?php

namespace Ch8\Src;

class LogAnalyzerWithInit
{
    private $initialized = false;

    public function initialize()
    {
        // ... initialize code here
        $this->initialized = true;
    }

    public function isValid(string $fileName):bool
    {
        if (!$this->initialized) {
            throw new NotInitializedException("The analyzer.initialize() method should be".
            "called before any other operation!");
        }

        if (strlen($fileName) < 8) {
            return true;
        }
        return false;
    }
}