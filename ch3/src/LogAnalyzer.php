<?php

namespace Ch3\Src;

class LogAnalyzer
{
    public function isValidLogFileName(string $fileName): bool
    {
        $manager = new FileExtensionManager();
        return $manager->isValid($fileName);
    }
}
