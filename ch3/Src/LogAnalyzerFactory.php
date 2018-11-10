<?php

namespace Ch3\Src;

class LogAnalyzerFactory
{
    private $manager;

    public function __construct()
    {
        $this->manager = ExtensionManagerFactory::Create();
    }

    public function isValidLogFileName(string $fileName): bool
    {
        return $this->manager->isValid($fileName);
    }
}
