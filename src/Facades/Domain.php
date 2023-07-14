<?php

namespace Bellows\PluginSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static bool isBaseDomain(string $domain)
 * @method static string getBaseDomain(string $domain)
 * @method static string getSubdomain(string $domain)
 * @method static string getFullDomain(string $subdomain, string $domain)
 */
class Domain extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'bellows_domain';
    }
}
