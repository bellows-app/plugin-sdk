<?php

namespace Bellows\PluginSdk\Data;

use Spatie\LaravelData\Data;

class Site extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly int $server_id,
        public readonly string $name,
        public readonly array $aliases,
        public readonly string $directory,
        public readonly bool $wildcards,
        public readonly string $status,
        public readonly bool $quick_deploy,
        public readonly string $project_type,
        public readonly string $php_version,
        public readonly string $username,
        public readonly string $deployment_url,
        public readonly bool $is_secured,
        public readonly array $tags,
        public readonly ?string $repository,
        public readonly ?string $repository_provider,
        public readonly ?string $repository_branch,
        public readonly ?string $repository_status,
        public readonly ?string $deployment_status,
        public readonly ?string $app,
        public readonly ?string $app_status,
        public readonly ?string $slack_channel,
        public readonly ?string $telegram_chat_id,
        public readonly ?string $telegram_chat_title,
        public readonly ?string $teams_webhook_url,
        public readonly ?string $discord_webhook_url,
        public readonly ?string $created_at,
        public readonly ?string $telegram_secret,
    ) {
    }
}
