<?php

namespace Bellows\PluginSdk\Testing\Doubles;

use Bellows\PluginSdk\Contracts\Env;
use Bellows\PluginSdk\Contracts\File;

class FakeProject
{
    public function appName(): string
    {
        return 'Test Project';
    }

    public function domain(): string
    {
        return 'testproject.test';
    }

    public function isolatedUser(): ?string
    {
        return 'test_user';
    }

    public function siteIsSecure(): bool
    {
        return true;
    }

    public function path(string $path): string
    {
        return $this->getDir() . '/' . $path;
    }

    public function getDir(): string
    {
        return sys_get_temp_dir();
    }

    public function file(string $path): File
    {
        return new FakeFile($this->path($path));
    }

    public function env(): Env
    {
        return app('bellows_env');
    }
}
