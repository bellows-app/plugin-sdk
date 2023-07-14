<?php

namespace Bellows\PluginSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Bellows\PluginSdk\Contracts\EntityFactory from(\Illuminate\Support\Collection $items)
 */
class Entity extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'bellows_entity';
    }
}
