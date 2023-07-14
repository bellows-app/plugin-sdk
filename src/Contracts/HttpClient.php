<?php

namespace Bellows\PluginSdk\Contracts;

use Bellows\PluginSdk\Data\AddApiCredentialsPrompt;
use Illuminate\Http\Client\PendingRequest;

interface HttpClient
{
    public function clearClients(): void;

    public function createClient(
        string $baseUrl,
        callable $factory,
        AddApiCredentialsPrompt $addCredentialsPrompt,
        callable $test,
        bool $shared = false,
    ): void;

    public function createJsonClient(
        string $baseUrl,
        callable $factory,
        AddApiCredentialsPrompt $addCredentialsPrompt,
        callable $test,
        bool $shared = false,
    ): void;

    public function client(string $name = 'default'): PendingRequest;
}
