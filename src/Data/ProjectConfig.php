<?php

namespace Bellows\PluginSdk\Data;

use Spatie\LaravelData\Data;

class ProjectConfig extends Data
{
    public function __construct(
        public readonly string $isolatedUser,
        public readonly Repository $repository,
        public readonly PhpVersion $phpVersion,
        public readonly string $directory,
        public readonly string $domain,
        public readonly string $appName,
        public readonly bool $secureSite,
    ) {
    }
}
