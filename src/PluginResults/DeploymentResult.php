<?php

namespace Bellows\PluginSdk\PluginResults;

use Bellows\PluginSdk\Data\CreateSiteParams;
use Bellows\PluginSdk\Data\InstallRepoParams;
use Bellows\PluginSdk\Data\SecurityRule;
use Bellows\PluginSdk\PluginResults\Helpers\HasDaemons;
use Bellows\PluginSdk\PluginResults\Helpers\HasEnvironmentVariables;
use Bellows\PluginSdk\PluginResults\Helpers\HasJobs;
use Bellows\PluginSdk\PluginResults\Helpers\HasWorkers;
use Bellows\PluginSdk\PluginResults\Helpers\UpdatesDeployScripts;
use Bellows\PluginSdk\PluginResults\Helpers\WrapsUp;

class DeploymentResult
{
    use HasEnvironmentVariables,
        WrapsUp,
        HasJobs,
        HasWorkers,
        HasDaemons,
        UpdatesDeployScripts;

    protected array $installRepoParams = [];

    protected array $createSiteParams = [];

    protected array $securityRules = [];

    public static function create()
    {
        return new static;
    }

    public function installRepoParams(InstallRepoParams $baseParams): static
    {
        $this->installRepoParams = $baseParams->toArray();

        return $this;
    }

    public function getInstallRepoParams(): array
    {
        return $this->installRepoParams;
    }

    public function createSiteParams(CreateSiteParams $params): static
    {
        $this->createSiteParams = $params->toArray();

        return $this;
    }

    public function getCreateSiteParams()
    {
        return $this->createSiteParams;
    }

    public function securityRule(SecurityRule $rule): static
    {
        $this->securityRules[] = $rule;

        return $this;
    }

    public function securityRules(iterable $rules): static
    {
        collect($rules)->each($this->securityRule(...));

        return $this;
    }

    public function getSecurityRules(): array
    {
        return $this->securityRules;
    }
}
