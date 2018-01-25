<?php

require "code-1.1.php";
require "code-1.2.php";

// main
try {
    SimpleParserTests::testReturnsZeroWhenEmptyString();
    SimpleParserTests::testExceptionWhenOver1Numbers();
} catch (Exception $e) {
    echo $e;
}