<?php

namespace Ch7\Src\LogAnalyzer;

class ConfigurationManager
{
    public function isConfigured(string $configName): bool
    {
        LoggingFacility::log("checking " . $configName);
        if (!file_exists($configName)) {
            throw new \Exception($configName . " Not Exist");
        }
        return true;
    }
}
