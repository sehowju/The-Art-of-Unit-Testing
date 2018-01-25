<?php

class SimpleParserTests
{
    public static function testReturnsZeroWhenEmptyString()
    {
        try {
            $p = new SimpleParser();
            $result = $p->parseAndSum("");
            // $result = $p->parseAndSum("1");
            if ($result !== 0) {
                // error message
                echo "SimpleParserTests::testReturnsZeroWhenEmptyString:" . PHP_EOL;
                echo "--------" . PHP_EOL;
                echo "Parse and sum should have returned 0 on an empty string, but got {$result}" . PHP_EOL;
            }
        } catch (Exception $e){
            echo $e;
        }
    }

    public static function testExceptionWhenOver1Numbers()
    {
        try {
            $p = new SimpleParser();
            $result = $p->parseAndSum("1,2");

            // error message
            echo "SimpleParserTests::testReturnsZeroWhenEmptyString:" . PHP_EOL;
            echo "--------" . PHP_EOL;
            echo "Parse and sum should throw exception when over 1 numbers" . PHP_EOL;
        } catch (Exception $e){
            if ($e->getMessage() !== "I can only handle 0 or 1 numbers for now!") {
                echo "SimpleParserTests::testReturnsZeroWhenEmptyString:" . PHP_EOL;
                echo "--------" . PHP_EOL;
                echo "Parse and sum when over 1 numbers exception not correct" . PHP_EOL;
            }
        }
    }
}

