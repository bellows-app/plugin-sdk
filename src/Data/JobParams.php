<?php

namespace Bellows\PluginSdk\Data;

use Bellows\PluginSdk\Enums\JobFrequency;
use Spatie\LaravelData\Attributes\Validation\Enum;
use Spatie\LaravelData\Data;

class JobParams extends Data
{
    public function __construct(
        public readonly string $command,
        #[Enum(JobFrequency::class)]
        public readonly JobFrequency $frequency,
        public readonly ?string $user = null,
    ) {
    }
}
