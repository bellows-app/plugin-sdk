<?php

namespace Bellows\PluginSdk\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
#[MapName(SnakeCaseMapper::class)]
class CreateSiteParams extends Data
{
    public function __construct(
        public readonly ?string $domain = null,
        public readonly ?string $projectType = null,
        public readonly ?string $directory = null,
        public readonly ?bool $isolated = null,
        public readonly ?string $username = null,
        public readonly ?string $phpVersion = null,
        public readonly ?int $octanePort = null,
    ) {
    }
}
