<?php

namespace Bellows\PluginSdk\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
#[MapName(SnakeCaseMapper::class)]
class InstallRepo extends Data
{
    public function __construct(
        public readonly string $provider,
        public readonly string $repository,
        public readonly string $branch,
        public readonly bool $composer,
    ) {
    }
}
