<?php

namespace Bellows\PluginSdk\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
#[MapName(SnakeCaseMapper::class)]
class CreateSite extends Data
{
    public function __construct(
        public readonly string $domain,
        public readonly string $projectType,
        public readonly string $directory,
        public readonly bool $isolated,
        public readonly string $username,
        public readonly string $phpVersion,
        public readonly ?int $octanePort = null,
    ) {
    }
}
