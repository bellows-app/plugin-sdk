<?php

namespace Bellows\PluginSdk;

abstract class Plugin implements Contracts\Plugin
{
    public int $priority = 0;

    public function getName(): string
    {
        return preg_replace(
            '/(?|([A-Z])([A-Z][a-z])|([a-z])([A-Z]))/',
            '$1 $2',
            class_basename($this),
        );
    }

    public function requiredComposerPackages(): array
    {
        return [];
    }

    public function anyRequiredComposerPackages(): array
    {
        return [];
    }

    public function requiredNpmPackages(): array
    {
        return [];
    }

    public function anyRequiredNpmPackages(): array
    {
        return [];
    }
}
