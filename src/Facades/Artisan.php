<?php

namespace Bellows\PluginSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string inDeployScript(string $command)
 * @method static string forDaemon(string $command)
 * @method static string forJob(string $command)
 * @method static string local(string $command)
 */
class Artisan extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'bellows_artisan';
    }
}
