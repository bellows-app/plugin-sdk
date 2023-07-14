<?php

namespace Bellows\PluginSdk\Values;

class RawValue
{
    public function __construct(
        protected readonly string $value,
    ) {
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
