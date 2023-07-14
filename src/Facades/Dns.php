<?php

namespace Bellows\PluginSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string providerName();
 * @method static bool addARecord(string $name, string $value, int $ttl);
 * @method static bool addTXTRecord(string $name, string $value, int $ttl);
 * @method static bool addCNAMERecord(string $name, string $value, int $ttl);
 * @method static string|null getARecord(string $name);
 * @method static string|null getTXTRecord(string $name);
 * @method static string|null getCNAMERecord(string $name);
 * @method static bool available();
 */
class Dns extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'bellows_dns';
    }
}
