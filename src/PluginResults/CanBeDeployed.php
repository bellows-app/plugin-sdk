<?php

namespace Bellows\PluginSdk\PluginResults;

trait CanBeDeployed
{
    public function confirmDeploy(): bool
    {
        return true;
    }

    public function defaultForDeployConfirmation(): bool
    {
        return false;
    }
}
