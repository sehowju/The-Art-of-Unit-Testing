<?php

namespace Ch5\Src;

class ErrorInfo
{
    private $severity;
    private $message;

    public function __construct($severity, $message)
    {
        $this->severity = $severity;
        $this->message = $message;
    }
}