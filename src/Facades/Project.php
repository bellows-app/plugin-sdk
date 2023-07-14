<?php

namespace Bellows\PluginSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string appName()
 * @method static string domain()
 * @method static ?string isolatedUser()
 * @method static bool siteIsSecure()
 * @method static string path(string $path)
 * @method static string dir()
 * @method static \Bellows\PluginSdk\Contracts\File file(string $path)
 * @method static \Bellows\PluginSdk\Contracts\File resource(string $path)
 * @method static \Bellows\PluginSdk\Contracts\File app(string $path)
 * @method static \Bellows\PluginSdk\Contracts\File config(string $path)
 * @method static \Bellows\PluginSdk\Contracts\File database(string $path)
 * @method static \Bellows\PluginSdk\Contracts\File storage(string $path)
 * @method static \Bellows\PluginSdk\Contracts\File public(string $path)
 * @method static \Bellows\PluginSdk\Contracts\Env env()
 */
class Project extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'bellows_project';
    }
}
