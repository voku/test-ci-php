<?php

namespace fooTests;

use foo\HelloWorld;

/**
 * @internal
 */
final class HelloWorldTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var HelloWorld
     */
    public $helloWorld;

    protected function setUp()
    {
        $this->helloWorld = new HelloWorld();
    }

    public function simpleStringProvider(): \Generator
    {
        yield ['lall', false];

        yield ['Hello', true];

        yield [' Hello', false];

        yield ['hello', false];
    }

    /**
     * @dataProvider simpleStringProvider
     *
     * @param string $input
     * @param bool   $contains
     */
    public function testOutput(string $input, bool $contains)
    {
        if ($contains) {
            self::assertContains($input, $this->helloWorld->output());
        } else {
            self::assertNotContains($input, $this->helloWorld->output());
        }
    }
}
