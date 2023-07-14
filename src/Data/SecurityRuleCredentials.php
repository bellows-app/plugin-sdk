<?php

namespace Bellows\PluginSdk\Data;

use Spatie\LaravelData\Data;

class SecurityRuleCredentials extends Data
{
    public function __construct(
        public readonly string $username,
        public readonly string $password,
    ) {
    }
}
