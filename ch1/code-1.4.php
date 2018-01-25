<?php

require "code-1.1.php";

class TestUtil
{
    public static function showProblem(string $test, string $message)
    {
        echo "---{$test}---\n{$message}\n--------------------\n";
    }
}

class SimpleParserTests
{
    public static function testReturnsZeroWhenEmptyString()
    {
        $testName = __METHOD__;
        try {
            $p = new SimpleParser();
            $result = $p->parseAndSum("");
            // $result = $p->parseAndSum("1");
            if ($result !== 0) {
                TestUtil::showProblem($testName, "Parse and sum should have returned 0 on an empty string");
            }
        } catch (Exception $e){
            echo $e;
        }
    }
}

// main
try {
    SimpleParserTests::testReturnsZeroWhenEmptyString();
} catch (Exception $e) {
    echo $e;
}