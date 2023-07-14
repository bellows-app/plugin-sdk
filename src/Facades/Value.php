<?php

namespace Bellows\PluginSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Bellows\PluginSdk\Values\RawValue raw($value)
 */
class Value extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'bellows_value';
    }
}
