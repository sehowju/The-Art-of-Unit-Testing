<?php

namespace Ch3\Src;

class LogAnalyzerProperty
{
    public $manager;

    public function setManager($manager)
    {
        $this->manager = $manager;
    }

    public function getManager()
    {
        return $this->manager;
    }

    public function isValidLogFileName(string $fileName): bool
    {
        try {
            $this->manager->isValid($fileName);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }
}
