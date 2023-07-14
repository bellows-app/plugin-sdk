<?php

namespace Bellows\PluginSdk\Data;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class WorkerParams extends Data
{
    public function __construct(
        public readonly string $connection,
        public readonly string $queue,
        public readonly ?int $timeout = 0,
        public readonly ?int $sleep = 60,
        public readonly ?int $processes = 1,
        public readonly ?int $stopwaitsecs = 10,
        public readonly ?bool $daemon = false,
        public readonly ?bool $force = false,
        public readonly ?int $tries = null,
        public readonly ?string $phpVersion = null,
    ) {
    }
}
