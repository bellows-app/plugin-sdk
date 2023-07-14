<?php

namespace Bellows\PluginSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static bool packageIsInstalled(string $package)
 * @method static void require(string|array $package, bool $dev = false, string $additionalFlags = null)
 * @method static void requireDev(string|array $package, string $additionalFlags = null)
 * @method static void addScript(string $event, string $command)
 * @method static void allowPlugin(string $plugin)
 */
class Composer extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'bellows_composer';
    }
}
