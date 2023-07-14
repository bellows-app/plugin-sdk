<?php

namespace Bellows\PluginSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void info(string $string, $verbosity = null)
 * @method static void warn(string $string, $verbosity = null)
 * @method static void error(string $string, $verbosity = null)
 * @method static void comment(string $string, $verbosity = null)
 * @method static void miniTask(string $key, string $value, bool $successful = true)
 * @method static void askForNumber(string $question, $default = null, $required = false)
 * @method static void askRequired(string $question, $default = null, $multiline = false)
 * @method static void anticipateRequired(string $question, array|callable $choices, $default = null)
 * @method static void withSpinner(string $title, callable $task, string|callable $message = null, string|callable $success = null, array $longProcessMessages = [])
 */

class Console extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'bellows_console';
    }
}
