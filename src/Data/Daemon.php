<?php

namespace Bellows\PluginSdk\Data;

use Spatie\LaravelData\Data;

class Daemon extends Data
{
    public function __construct(
        public readonly string $command,
        public readonly string $user,
        public readonly string $directory,
    ) {
    }
}
