<?php

namespace Bellows\PluginSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string get();
 * @method static string addAfterComposerInstall(string|array $toAdd);
 * @method static string addAfterGitPull(string|array $toAdd);
 * @method static string addBeforePHPReload(string|array $toAdd);
 * @method static string addAfterLine(string $toFind, string|array $toAdd);
 * @method static string addBeforeLine(string|array $toFind, string|array $toAdd);
 * @method static string addAtBeginning(string|array $toAdd);
 * @method static string addAtEnd(string|array $toAdd);
 */
class DeployScript extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'bellows_deploy_script';
    }
}
