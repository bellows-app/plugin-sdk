<?php

namespace Bellows\PluginSdk\Testing\Doubles;

use Bellows\PluginSdk\Contracts\ServerProviders\ServerInterface;
use Bellows\PluginSdk\Contracts\ServerProviders\SiteInterface;

class FakeDeployment
{
    public function site(): SiteInterface
    {
        return app('bellows_site');
    }

    public function primarySite(): SiteInterface
    {
        return app('bellows_primary_site');
    }

    public function server(): ServerInterface
    {
        return app('bellows_server');
    }

    public function primaryServer(): ServerInterface
    {
        return app('bellows_primary_server');
    }
}
