<?php

namespace Bellows\PluginSdk\Testing\Doubles;

use Bellows\PluginSdk\Contracts\Env;
use Bellows\PluginSdk\Contracts\ServerProviders\SiteInterface;
use Bellows\PluginSdk\Data\Site;
use Bellows\PluginSdk\Testing\HandlesMockCalls;

class FakeSite implements SiteInterface
{
    use HandlesMockCalls;

    protected $defaultData = [
        'id'             => 1,
        'server_id'      => 1,
        'name'           => 'Test Site',
        'aliases'        => [],
        'directory'      => '/home/test_site/testsite.com',
        'wildcards'      => false,
        'status'         => 'installed',
        'quick_deploy'   => true,
        'project_type'   => 'php',
        'php_version'    => '8.2',
        'username'       => 'test_site',
        'deployment_url' => '',
        'is_secured'     => true,
        'tags'           => [],
    ];

    public function env(): Env
    {
        return $this->consume(__FUNCTION__, new FakeEnv([]));
    }

    public function isInDeploymentScript(string|iterable $script): bool
    {
        return $this->consume(__FUNCTION__, false);
    }

    public function returnEnv(array $env): self
    {
        $this->shouldReceive('env')->andReturn(new FakeEnv($env));

        return $this;
    }

    public function data(): Site
    {
        return $this->consume(
            __FUNCTION__,
            Site::from($this->defaultData),
        );
    }

    public function mergeData(array $data): self
    {
        $this->shouldReceive('data')->andReturn(
            Site::from(array_merge($this->defaultData, $data)),
        );

        return $this;
    }
}
