<?php

namespace Bellows\PluginSdk\Testing\Doubles;

use Bellows\PluginSdk\Contracts\HttpClient;
use Bellows\PluginSdk\Data\AddApiCredentialsPrompt;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class FakeHttpClient implements HttpClient
{
    protected $clients = [];

    protected $credentials = ['token' => 'personal-access-token'];

    public function clearClients(): void
    {
        $this->clients = [];
    }

    public function createClient(
        string $baseUrl,
        callable $factory,
        AddApiCredentialsPrompt $addCredentialsPrompt,
        callable $test,
        bool $shared = false
    ): void {
        $this->clients['default'] = $factory(Http::baseUrl($baseUrl), $this->credentials);
    }

    public function createJsonClient(
        string $baseUrl,
        callable $factory,
        AddApiCredentialsPrompt $addCredentialsPrompt,
        callable $test,
        bool $shared = false
    ): void {
        $this->createClient(
            $baseUrl,
            fn ($request, $credentials) => $factory($request, $credentials)->acceptJson()->asJson(),
            $addCredentialsPrompt,
            $test,
            $shared,
        );
    }

    public function setCredentials(array $credentials)
    {
        $this->credentials = $credentials;
    }

    public function client(string $name = 'default'): PendingRequest
    {
        return $this->clients[$name];
    }
}
