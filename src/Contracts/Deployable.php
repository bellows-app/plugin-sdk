<?php

namespace Bellows\PluginSdk\Contracts;

use Bellows\PluginSdk\PluginResults\DeploymentResult;

interface Deployable extends Plugin
{
    public function deploy(): ?DeploymentResult;

    public function shouldDeploy(): bool;

    public function confirmDeploy(): bool;
}
