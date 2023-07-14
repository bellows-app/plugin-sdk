<?php

namespace Bellows\PluginSdk\Contracts;

interface Env
{
    public function get(string $key): ?string;

    public function set($key, $value): void;

    public function has(string $key): bool;

    public function hasAll(string ...$keys): bool;

    public function hasAny(string ...$keys): bool;

    public function all(): array;
}
