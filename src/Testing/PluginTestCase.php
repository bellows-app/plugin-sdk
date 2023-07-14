<?php

namespace Bellows\PluginSdk\Testing;

use Bellows\PluginSdk\Contracts\HttpClient;
use Bellows\PluginSdk\Testing\Doubles\FakeArtisan;
use Bellows\PluginSdk\Testing\Doubles\FakeComposer;
use Bellows\PluginSdk\Testing\Doubles\FakeConsole;
use Bellows\PluginSdk\Testing\Doubles\FakeDeployment;
use Bellows\PluginSdk\Testing\Doubles\FakeDeployScript;
use Bellows\PluginSdk\Testing\Doubles\FakeDns;
use Bellows\PluginSdk\Testing\Doubles\FakeEnv;
use Bellows\PluginSdk\Testing\Doubles\FakeHttpClient;
use Bellows\PluginSdk\Testing\Doubles\FakeNpm;
use Bellows\PluginSdk\Testing\Doubles\FakeProject;
use Bellows\PluginSdk\Testing\Doubles\FakeServer;
use Bellows\PluginSdk\Testing\Doubles\FakeSite;
use Bellows\PluginSdk\Util\Entity;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Orchestra\Testbench\TestCase;
use Spatie\LaravelData\LaravelDataServiceProvider;

class PluginTestCase extends TestCase
{
    protected $loadEnvironmentVariables = false;

    protected function setUp(): void
    {
        parent::setUp();

        $this->app->bind('bellows_console', fn () => new FakeConsole);
        $this->app->bind('bellows_entity', fn () => new Entity);
        $this->app->bind('bellows_project', fn () => new FakeProject);
        $this->app->bind('bellows_composer', fn () => new FakeComposer);
        $this->app->bind('bellows_artisan', fn () => new FakeArtisan);
        $this->app->bind('bellows_deployment', fn () => new FakeDeployment);
        $this->app->bind('bellows_dns', fn () => new FakeDns);

        $this->app->singleton(HttpClient::class, fn () => new FakeHttpClient);

        $this->app->singleton('bellows_npm', fn () => new FakeNpm);
        $this->app->singleton('bellows_env', fn () => new FakeEnv([]));
        $this->app->singleton('bellows_deploy_script', fn () => new FakeDeployScript);
        $this->app->singleton('bellows_server', fn () => new FakeServer);
        $this->app->singleton('bellows_site', fn () => new FakeSite);
        $this->app->singleton('bellows_primary_server', fn () => new FakeServer);
        $this->app->singleton('bellows_primary_site', fn () => new FakeSite);
    }

    public function plugin(string $pluginClass): PendingPlugin
    {
        return new PendingPlugin($this, $pluginClass);
    }

    public function setEnv(array $vars): void
    {
        foreach ($vars as $key => $value) {
            $this->app['bellows_env']->set($key, $value);
        }
    }

    public function setJsPackageManager(string $packageManager): void
    {
        $this->app['bellows_npm']->setPackageManager($packageManager);
    }

    public function assertRequestWasSent(string $method, string $url, array $data): void
    {
        Http::assertSent(
            fn (Request $request) => $this->isUrl($request, $url)
                && strtoupper($request->method()) === strtoupper($method)
                && $request->data() === $data
        );
    }

    public function fakeSite(): FakeSite
    {
        return new FakeSite;
    }

    public function fakeServer(): FakeServer
    {
        return new FakeServer;
    }

    public function setHttpCredentials(array $credentials)
    {
        app(HttpClient::class)->setCredentials($credentials);
    }

    public function isUrl(Request $request, string $path): bool
    {
        if (str_contains($path, 'https://')) {
            return $request->url() === $path;
        }

        return Str::endsWith(parse_url($request->url(), PHP_URL_PATH), $path);
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app)
    {
        return [
            LaravelDataServiceProvider::class,
        ];
    }
}
