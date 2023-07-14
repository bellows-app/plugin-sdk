<?php

namespace Bellows\PluginSdk\Testing\Doubles;

use Bellows\PluginSdk\Contracts\Env;

class FakeEnv implements Env
{
    public function __construct(protected array $envVars)
    {
    }

    public function get(string $key): ?string
    {
        return $this->envVars[$key] ?? null;
    }

    public function set($key, $value): void
    {
        $this->envVars[$key] = $value;
    }

    public function has(string $key): bool
    {
        return isset($this->envVars[$key]);
    }

    public function hasAll(...$keys): bool
    {
        return collect($keys)->every(fn ($key) => $this->has($key));
    }

    public function hasAny(...$keys): bool
    {
        return collect($keys)->some(fn ($key) => $this->has($key));
    }

    public function all(): array
    {
        return $this->envVars;
    }
}
