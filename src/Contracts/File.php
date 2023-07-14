<?php

namespace Bellows\PluginSdk\Contracts;

interface File
{
    public function addJsImport(string|array $content): static;

    public function addAfterJsImports(string|array $content): static;

    public function replace(string $search, string $replace): static;

    public function get(): string;

    public function write(string $contents): void;

    public function exists(): bool;
}
