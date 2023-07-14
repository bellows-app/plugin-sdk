<?php

namespace Bellows\PluginSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void add(string|array $files = null)
 * @method static void commit(string $message)
 * @method static void push()
 * @method static void ignore(string ...$files)
 */
class Git extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'bellows_git';
    }
}
