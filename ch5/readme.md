# Diving into PHPUnit Doubles

```php
$stub = $this->createMock(SomeClass::class);
$stub->expects($this->any())->method('doSomething')->with($this->any())->willReturn('foo');
```

## Create Fake

* createMock($type)
    The creation of this test double is performed using best practice defaults.

    ```php
    $stub = $this->getMockBuilder(SomeClass::class)
                    ->disableOriginalConstructor()
                    ->disableOriginalClone()
                    ->disableArgumentCloning()
                    ->disallowMockingUnknownTypes()
                    ->getMock();
    ```

* getMockBuilder($type)
    * enableArgumentCloning()
    * setMethods(array $methods)
    * setMethodsExcept(array $methods)
    * setConstructorArgs(array $args)
    * setMockClassName($name)
    * disableOriginalConstructor()
    * enableOriginalConstructor()
    * disableOriginalClone()
    * enableOriginalClone()
    * disableAutoload()
    * enableAutoload()
    * disableArgumentCloning()
    * enableArgumentCloning()
    * enableProxyingToOriginalMethods()
    * disableProxyingToOriginalMethods()
    * setProxyTarget($object)
    * allowMockingUnknownTypes()
    * disallowMockingUnknownTypes()
    * enableAutoReturnValueGeneration()
    * disableAutoReturnValueGeneration()

    ```php
    $stub = $this->getMockBuilder(SomeClass::class)
                         ->setMethods(['update'])
                         ->getMock();
    ```

> By default, all methods of the original class are replaced with a dummy implementation that just returns `null`

## Will

* willReturn($value);
* will($this->returnValue($value));
* will($this->returnArgument(0));
* will($this->returnSelf());
* will($this->returnValueMap($map));
* will($this->returnCallback('str_rot13'));
* will($this->onConsecutiveCalls(2, 3, 5, 7));
* will($this->throwException(new Exception));

> You can even create an option for running the tests with the stub database or the real database, so you can use your tests for both local testing during development and integration testing with the real database.

## Mock

* with($this->equalTo('something'));

```php
with(
    $this->greaterThan(0),
    $this->stringContains('Something'),
    $this->anything()
);
```

```php
withConsecutive(
    [$this->equalTo('foo'), $this->greaterThan(0)],
    [$this->equalTo('bar'), $this->greaterThan(0)]
);
```

```php
with($this->greaterThan(0),
    $this->stringContains('Something'),
    $this->callback(function($subject){
        return is_callable([$subject, 'getName']) &&
                $subject->getName() == 'My subject';
}));
```

```php
with($this->identicalTo($expectedObject));
```

## Expect

* expects($this->any())
* expects($this->never())
* expects($this->atLeastOnce())
* expects($this->once())
* expects($this->exactly(1))
* expects($this->at(2))

## Traits and Abstract Classes

* getMockForTrait()

    ```php
    $stub = $this->getMockForTrait(SomeTrait::class);
    // the same as ordinary
    ```

* getMockForAbstractClass()

    ```php
    $stub = $this->getMockForAbstractClass(SomeAbstractClass::class);
    // the same as ordinary
    ```

## Filesystem

```json
{
    "require-dev": {
        "phpunit/phpunit": "~4.6",
        "mikey179/vfsStream": "~1"
    }
}
```

```php
<?php
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function setUp()
    {
        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory('exampleDir'));
    }

    public function testDirectoryIsCreated()
    {
        $example = new Example('id');
        $this->assertFalse(vfsStreamWrapper::getRoot()->hasChild('id'));

        $example->setDirectory(vfsStream::url('exampleDir'));
        $this->assertTrue(vfsStreamWrapper::getRoot()->hasChild('id'));
    }
}
```