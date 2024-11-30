--TEST--
Extendable class with property with non-final get property hook
--SKIPIF--
<?php declare(strict_types=1);
if (!method_exists(ReflectionProperty::class, 'isFinal')) {
    print 'skip: PHP 8.4 is required.';
}
--FILE--
<?php declare(strict_types=1);
class Foo
{
    public string $bar {
        get {
            return 'value';
        }
    }
}

require_once __DIR__ . '/../../../bootstrap.php';

$generator = new \PHPUnit\Framework\MockObject\Generator\Generator;

$testDoubleClass = $generator->generate(
    type: Foo::class,
    mockObject: false,
    methods: [],
    mockClassName: 'TestStubFoo',
);

print $testDoubleClass->classCode();
--EXPECT--
declare(strict_types=1);

class TestStubFoo extends Foo implements PHPUnit\Framework\MockObject\StubInternal
{
    use PHPUnit\Framework\MockObject\StubApi;
    use PHPUnit\Framework\MockObject\Method;
    use PHPUnit\Framework\MockObject\DoubledCloneMethod;

    public string $bar {
        get {
            return $this->__phpunit_getInvocationHandler()->invoke(
                new \PHPUnit\Framework\MockObject\Invocation(
                    'TestStubFoo', '$bar::get', [], 'string', $this
                )
            );
        }
    }
}