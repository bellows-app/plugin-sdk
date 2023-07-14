<?php

namespace Bellows\PluginSdk\Data;

use Spatie\LaravelData\Data;

class Server extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $type,
        public readonly string $ip_address,
        public readonly ?string $provider,
        public readonly ?string $size,
        public readonly ?string $region,
        public readonly ?string $ubuntu_version,
        public readonly ?string $php_version,
        public readonly ?string $php_cli_version,
        public readonly ?string $database_type,
        public readonly ?int $ssh_port,
        public readonly ?string $private_ip_address,
        public readonly ?string $local_public_key,
        public readonly ?bool $revoked,
        public readonly ?string $created_at,
        public readonly ?bool $is_ready,
        public readonly ?array $tags,
        public readonly ?array $network,
        public readonly ?int $credential_id,
        public readonly ?string $provider_id,
        public readonly ?string $db_status = null,
        public readonly ?string $redis_status = null,
        public readonly ?string $blackfire_status = null,
        public readonly ?string $papertrail_status = null,
    ) {
    }
}
