<?php

namespace Bellows\PluginSdk\PluginResults\Helpers;

use Closure;

trait UpdatesDeployScripts
{
    protected ?Closure $updateDeployScript = null;

    public function updateDeployScript(Closure $cb): static
    {
        $this->updateDeployScript = $cb;

        return $this;
    }

    public function getUpdateDeployScript()
    {
        if ($this->updateDeployScript ?? null) {
            return ($this->updateDeployScript)();
        }

        return null;
    }
}
