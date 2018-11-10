<?php

namespace Ch3\Src;

class ExtensionManagerFactory
{
    private static $customManager = null;

    public static function Create(): ExtensionManagerInterface
    {
        if (!is_null(self::$customManager)) {
            return self::$customManager;
        }
        return new FileExtensionManager();
    }

    // remove declaration for multi types
    public static function setManager($mgr)
    {
        self::$customManager = $mgr;
    }
}