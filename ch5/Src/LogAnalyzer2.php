<?php

namespace Ch5\Src;

class LogAnalyzer2
{
    private $logger;
    private $webService;
    public $minNameLength;

    public function __construct(LoggerInterface $logger, WebServiceInterface $webService)
    {
        $this->logger = $logger;
        $this->webService = $webService;
    }

    public function analyze(string $fileName):void
    {
        if (strlen($fileName) < $this->minNameLength) {
            try {
                $this->logger->logError("Filename too short: " . $fileName);
            } catch (\Exception $e) {
                $this->webService->write("Error From Logger: " . $e->getMessage());
            }
        }
    }
}
