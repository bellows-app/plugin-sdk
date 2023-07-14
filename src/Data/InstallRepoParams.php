<?php

namespace Bellows\PluginSdk\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
#[MapName(SnakeCaseMapper::class)]
class InstallRepoParams extends Data
{
    public function __construct(
        public readonly ?string $provider = null,
        public readonly ?string $repository = null,
        public readonly ?string $branch = null,
        public readonly ?bool $composer = null,
    ) {
    }
}
