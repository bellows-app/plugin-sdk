<?php

namespace Bellows\PluginSdk\Contracts;

interface EntityFactory
{
    public function selectFromExisting(string $question, string $key, array|string|callable $value, string $newItemChoice): static;

    public function createNew(string $question, callable $callback): static;

    public function prompt(): mixed;
}
