<?php

namespace Bellows\PluginSdk\Data;

use Spatie\LaravelData\Data;

class PhpVersion extends Data
{
    public function __construct(
        /** e.g. php82 */
        public readonly string $version,
        /** e.g. php8.2 */
        public readonly string $binary,
        /** e.g. PHP 8.2 */
        public readonly string $display,
        public readonly ?string $status = null,
        public readonly ?bool $used_as_default = null,
        public readonly ?bool $used_on_cli = null,
    ) {
    }
}
