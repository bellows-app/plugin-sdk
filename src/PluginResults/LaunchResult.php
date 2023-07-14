<?php

namespace Bellows\PluginSdk\PluginResults;

use Bellows\PluginSdk\PluginResults\Helpers\HasDaemons;
use Bellows\PluginSdk\PluginResults\Helpers\HasEnvironmentVariables;
use Bellows\PluginSdk\PluginResults\Helpers\HasJobs;
use Bellows\PluginSdk\PluginResults\Helpers\HasWorkers;
use Bellows\PluginSdk\PluginResults\Helpers\UpdatesDeployScripts;
use Bellows\PluginSdk\PluginResults\Helpers\WrapsUp;

class LaunchResult
{
    use HasEnvironmentVariables,
        WrapsUp,
        HasJobs,
        HasWorkers,
        HasDaemons,
        UpdatesDeployScripts;

    protected array $installRepoParams = [];

    protected array $createSiteParams = [];

    public static function create()
    {
        return new static;
    }
}
