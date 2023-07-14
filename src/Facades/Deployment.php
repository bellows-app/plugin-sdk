<?php

namespace Bellows\PluginSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Bellows\PluginSdk\ServerProviders\SiteInterface site()
 * @method static \Bellows\PluginSdk\ServerProviders\SiteInterface primarySite()
 * @method static \Bellows\PluginSdk\ServerProviders\ServerInterface server()
 * @method static \Bellows\PluginSdk\ServerProviders\ServerInterface primaryServer()
 * @method static bool confirmChangeValueTo(string $current = null, string $new, string $message)
 */
class Deployment extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'bellows_deployment';
    }
}
