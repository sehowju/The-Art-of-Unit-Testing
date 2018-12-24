<?php

namespace Ch8\Tests;

use PHPUnit\Framework\TestCase;
use Ch8\Src\LogAnalyzer;
use Ch8\Src\AnalyzedOutput;

function sum($a, $b, $c) {
    return \array_sum([$a, $b, $c]);
}

class MaintainableTest extends TestCase
{

    const EARTH_PI = 3.14;

    public function test_CheckVariousSumResultsOgnoringHigherThan1001()
    {
        $this->assertEquals(3, sum(0,1,2));
        $this->assertEquals(3, sum(1,0,2));
        $this->assertEquals(3, sum(1,2,0));
    }

    /**
     * @dataProvider extensionProvider
     */
    public function test_CheckVariousSumResultsOgnoringHigherThan1001_DataProvider($a, $b, $c)
    {
        $this->assertEquals(3, sum($a, $b, $c));
    }

    public function extensionProvider() {
        return [
            [0,1,2],
            [1,0,2],
            [1,2,0],
        ];
    }

    public function test_Analyze_SimpleStringLine_UsesDefaultTableDelimiterToParseFields()
    {
        $log = new LogAnalyzer();
        $output = $log->analyze("10:05\tOpen\tRoy");

        $this->assertEquals(1, $output->lineCount);
        $this->assertEquals("10:05", $output->GetLine(1)[0]);
        $this->assertEquals("Open", $output->GetLine(1)[1]);
        $this->assertEquals("Roy", $output->GetLine(1)[2]);
    }

    public function test_Analyze_SimpleStringLine_UsesDefaultTableDelimiterToParseFields_Object()
    {
        $log = new LogAnalyzer();
        $expected = new AnalyzedOutput();
        $expected->addLine("10:05", "Open", "Roy");
        $expected->addLine("10:05", "Open", "Dino");

        $output = $log->analyze("10:05\tOpen\tRoy");
        $output = $log->analyze("10:05\tOpen\tDino");

        $this->assertEquals($expected, $output);
    }

    public function test_Initialize_WhenCalled_SetsDefaultDelimiterIsTabDelimiter()
    {
        $log = new LogAnalyzer();
        $this->assertEquals(null, $log->GetInternalDefaultDelimiter());
        $log->initialize();
        $this->assertEquals("\t", $log->GetInternalDefaultDelimiter());
    }

    public function test_isLoginOK_UserDoesNotExist_ReturnsFalse()
    {
        $fakeData = $this->createMock("User");
        $fakeData->method("getUserByName")->with($this->isType("string"))->willReturn(null);

        $login = new LoginManager($fakeData);
        $result = $login->isLoginOk("UserNameThatDoesNotExist", "anypassword");
        $this->assertTrue($result);
    }
}

class User extends Model
{
    public function getUserByName()
    {

    }
}

class LoginManager
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function isLoginOk($username, $password): bool
    {
        $user = $this->user->getUserByName($username);
        if (is_null($user)) {
            return false;
        }
        return true;
    }
}