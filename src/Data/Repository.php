<?php

namespace Bellows\PluginSdk\Data;

use Spatie\LaravelData\Data;

class Repository extends Data
{
    public function __construct(
        public readonly string $url,
        public readonly string $branch,
        public readonly RepositoryProvider $provider = RepositoryProvider::GITHUB,
    ) {
    }
}
