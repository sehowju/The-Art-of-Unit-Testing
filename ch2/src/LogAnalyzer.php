<?php

namespace Ch2\Src;

class LogAnalyzer
{
    const EXT = ".SLF";

    public $wasLastFileNameValid = false;

    public function isValidLogFileName(string $fileName): bool
    {
        if (is_null($fileName) || $fileName === "") {
            throw new \InvalidArgumentException("filename has to be provided");
        }
        // if (substr_compare($fileName, ".SLF", -strlen(".SLF")) !== 0) {
        // if (substr_compare($fileName, ".SLF", -strlen(".SLF")) === 0) {
        // case insensitive
        // if (substr_compare($fileName, self::EXT, -strlen(self::EXT), strlen($fileName), true) !== 0) {
        if (!$this->isStrEndsWithCaseInsensitively($fileName, self::EXT)) {
            return false;
        }

        $this->wasLastFileNameValid = true;
        return true;
    }

    private function isStrEndsWithCaseInsensitively($mainStr, $str) {
        return substr_compare($mainStr, $str, -strlen($str), strlen($mainStr), true) === 0;
    }

}
