<?php

namespace Bellows\PluginSdk\Contracts;

interface Plugin
{
    public function getName(): string;

    public function requiredComposerPackages(): array;

    public function anyRequiredComposerPackages(): array;

    public function requiredNpmPackages(): array;

    public function anyRequiredNpmPackages(): array;
}
