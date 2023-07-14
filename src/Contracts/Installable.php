<?php

namespace Bellows\PluginSdk\Contracts;

use Bellows\PluginSdk\PluginResults\InstallationResult;

interface Installable extends Plugin
{
    public function install(): ?InstallationResult;
}
