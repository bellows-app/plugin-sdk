<?php

namespace Bellows\PluginSdk\Contracts\ServerProviders;

use Illuminate\Support\Collection;

interface ServerProviderInterface
{
    public function setCredentials(): void;

    public function getServers(): Collection;

    public function getServer(): ?ServerInterface;

    public function getServerDeployTargetFromServer(ServerInterface $server): ServerDeployTarget;
}
