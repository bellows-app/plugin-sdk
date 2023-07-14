<?php

namespace Bellows\PluginSdk\PluginResults\Helpers;

trait HasEnvironmentVariables
{
    protected array $environmentVariables = [];

    public function environmentVariable(string $key, mixed $value): static
    {
        $this->environmentVariables[$key] = $value;

        return $this;
    }

    public function environmentVariables(array $environmentVariables): static
    {
        foreach ($environmentVariables as $key => $value) {
            $this->environmentVariable($key, $value);
        }

        return $this;
    }

    public function getEnvironmentVariables()
    {
        return $this->environmentVariables;
    }
}
