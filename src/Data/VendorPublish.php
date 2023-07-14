<?php

namespace Bellows\PluginSdk\Data;

use Spatie\LaravelData\Data;

class VendorPublish extends Data
{
    public function __construct(
        public readonly ?string $provider = null,
        public readonly ?string $tag = null,
    ) {
    }
}
