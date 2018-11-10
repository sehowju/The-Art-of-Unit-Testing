<?php

namespace Ch5\Src;

class LogAnalyzer
{
    private $logger;
    public $minNameLength;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function analyze(string $fileName)
    {
        if (strlen($fileName) < $this->minNameLength) {
            $this->logger->logError("Filename too short: " . $fileName);
        }
    }
}
