<?php

namespace Bellows\PluginSdk\Data;

use Spatie\LaravelData\Data;

class AddApiCredentialsPrompt extends Data
{
    public function __construct(
        public readonly string $url,
        public readonly array $credentials,
        public readonly string $displayName,
        public readonly array $requiredScopes = [],
        public readonly array $optionalScopes = [],
        public readonly ?string $helpText = null,
    ) {
    }
}
