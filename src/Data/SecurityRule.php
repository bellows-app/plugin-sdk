<?php

namespace Bellows\PluginSdk\Data;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class SecurityRule extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $path,
        #[DataCollectionOf(SecurityRuleCredentials::class)]
        public readonly DataCollection $credentials,
    ) {
    }
}
