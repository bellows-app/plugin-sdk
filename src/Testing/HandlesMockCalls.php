<?php

namespace Bellows\PluginSdk\Testing;

use Illuminate\Testing\Assert;

trait HandlesMockCalls
{
    protected array $expectedCalls = [];

    public function shouldReceive(string $method): MockExpectation
    {
        $mock = new MockExpectation($method);

        $this->expectedCalls[] = $mock;

        return $mock;
    }

    public function __destruct()
    {
        Assert::assertEmpty(
            $this->expectedCalls,
            sprintf(
                'Expected calls were not made on %s: %s',
                __CLASS__,
                collect($this->expectedCalls)->map(fn ($call) => $call->method())->join(', ')
            ),
        );
    }

    protected function consume(string $method, mixed $default)
    {
        foreach ($this->expectedCalls as $index => $item) {
            if ($item->method() === $method) {
                unset($this->expectedCalls[$index]);

                return $item->returnValue();
            }
        }

        return $default;
    }
}
