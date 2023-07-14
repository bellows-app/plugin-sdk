<?php

namespace Bellows\PluginSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void install(string|array $package, bool $dev = false)
 * @method static void installDev(string|array $package)
 * @method static string getPackageManager()
 * @method static bool packageIsInstalled(string $package)
 * @method static bool hasScriptCommand(string $command)
 * @method static void addScriptCommand(string $name, string $command)
 */
class Npm extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'bellows_npm';
    }
}
