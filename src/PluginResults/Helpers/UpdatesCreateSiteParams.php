<?php

namespace Bellows\PluginSdk\PluginResults\Helpers;

use Bellows\PluginSdk\Data\CreateSiteParams;

trait UpdatesCreateSiteParams
{
    protected ?CreateSiteParams $createSiteParams = null;

    public function createSiteParams(CreateSiteParams $params): static
    {
        $this->createSiteParams = $params;

        return $this;
    }

    public function getCreateSiteParams()
    {
        return $this->createSiteParams;
    }
}
