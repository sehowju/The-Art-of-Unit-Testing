<?php

namespace Ch3\Src;

class LogAnalyzerUsingFactoryMethod
{
    public function isValidLogFileName(string $fileName): bool
    {
        return $this->getManager()->IsValid($fileName);
    }

    protected function getManager(): ExtensionManagerInterface
    {
        return new FileExtensionManager();
    }
}
