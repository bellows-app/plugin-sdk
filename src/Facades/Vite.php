<?php

namespace Bellows\PluginSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void addPlugin(string $content)
 */
class Vite extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'bellows_vite';
    }
}
