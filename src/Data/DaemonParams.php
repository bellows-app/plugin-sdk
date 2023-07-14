<?php

namespace Bellows\PluginSdk\Data;

use Spatie\LaravelData\Data;

class DaemonParams extends Data
{
    public function __construct(
        public readonly string $command,
        public readonly ?string $user = null,
        public readonly ?string $directory = null,
    ) {
    }
}
