<?php

namespace Bellows\PluginSdk\Testing;

use BadMethodCallException;
use Bellows\PluginSdk\Facades\Console;

class PendingPlugin
{
    public function __construct(
        protected PluginTestCase $test,
        protected string $pluginClass,
    ) {
    }

    public function expectsConfirmation(string $question, string $default): self
    {
        Console::shouldReceiveQuestion($question, $default === 'yes');

        return $this;
    }

    public function expectsOutputToContain(string $expected): self
    {
        Console::outputShouldContain($expected);

        return $this;
    }

    public function expectsOutput(string $expected): self
    {
        Console::shouldReceiveOutput($expected);

        return $this;
    }

    public function expectsQuestion(string $question, string $answer = null): self
    {
        Console::shouldReceiveQuestion($question, $answer);

        return $this;
    }

    public function __call(string $method, array $arguments)
    {
        $plugin = app($this->pluginClass);

        if (method_exists($plugin, $method)) {
            $result = $plugin->$method(...$arguments);

            Console::validate();

            return $result;
        }

        throw new BadMethodCallException("Method {$method} does not exist on {$this->pluginClass}");
    }
}
