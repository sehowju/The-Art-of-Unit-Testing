<?php

namespace Ch3\Src;

class LogAnalyzerUsingOverrideMethod
{
    public function isValidLogFileName(string $fileName): bool
    {
        return $this->isValid($fileName);
    }

    protected function isValid($fileName): bool
    {
        $manager = new FileExtensionManager();
        return $manager->isValid($fileName);
    }
}
