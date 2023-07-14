<?php

namespace Bellows\PluginSdk\Contracts\ServerProviders;

use Bellows\PluginSdk\Data\Server;
use Bellows\PluginSdk\Data\Site;
use Illuminate\Support\Collection;

interface ServerInterface
{
    /** @return Collection<Site> */
    public function sites(): Collection;

    public function hasDaemon(string $command): bool;

    public function hasJob(string $command): bool;

    public function data(): Server;
}
