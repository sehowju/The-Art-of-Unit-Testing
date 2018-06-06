<?php

namespace Ch3\Src;

class LogAnalyzerConstruct
{
    private $manager;

    public function __construct(ExtensionManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function isValidLogFileName(string $fileName): bool
    {
        return $this->manager->isValid($fileName);
    }
}
