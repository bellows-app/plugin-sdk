<?php

namespace Bellows\PluginSdk\Testing;

class MockExpectation
{
    protected mixed $returnValue;

    public function __construct(
        protected string $method,
    ) {
    }

    public function andReturn(mixed $value): void
    {
        $this->returnValue = $value;
    }

    public function method()
    {
        return $this->method;
    }

    public function returnValue()
    {
        return $this->returnValue ?? null;
    }
}
