<?php

namespace Ch3\Src;

interface ExtensionManagerInterface
{
    public function isValid(string $fileName): bool;
}
