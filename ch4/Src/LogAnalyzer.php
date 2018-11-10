<?php

namespace Ch4\Src;

class LogAnalyzer
{
    private $service;

    public function __construct(WebServiceInterface $service)
    {
        $this->service = $service;
    }

    public function analyze(string $fileName)
    {
        if (strlen($fileName) < 8) {
            $this->service->logError("Filename too short: " . $fileName);
        }
    }
}
