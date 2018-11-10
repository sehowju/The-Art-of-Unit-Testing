<?php

namespace Ch3\Src;

class FileExtensionManager implements ExtensionManagerInterface
{
    public function isValid(string $fileName): bool
    {
        $content = file_get_contents("./ext.json");
        $exts = json_decode($content);
        return in_array($fileName, $exts);
    }
}
