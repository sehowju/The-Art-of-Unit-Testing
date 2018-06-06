<?php

namespace Ch3\Src;

class LogAnalyzerException
{
    private $manager;

    public function __construct(ExtensionManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function isValidLogFileName(string $fileName): bool
    {
        try {
            $valid = $this->manager->isValid($fileName);
        } catch (\Exception $e) {
            return false;
        }
        return $valid;
    }
}
