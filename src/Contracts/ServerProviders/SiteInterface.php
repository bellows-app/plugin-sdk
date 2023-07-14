<?php

namespace Bellows\PluginSdk\Contracts\ServerProviders;

use Bellows\PluginSdk\Contracts\Env;
use Bellows\PluginSdk\Data\Site;

interface SiteInterface
{
    public function env(): Env;

    public function isInDeploymentScript(string|iterable $script): bool;

    public function data(): Site;
}
