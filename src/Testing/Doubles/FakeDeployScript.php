<?php

namespace Bellows\PluginSdk\Testing\Doubles;

class FakeDeployScript
{
    public function __call($name, $arguments)
    {
        // For the purposes of tests, we don't need to test the deploy script helper itself,
        // we just need to ensure that the plugin is calling it correctly.
        // Just return whatever strings are passed to the helper.
        $toAdd = $arguments[0];

        if (!is_array($toAdd)) {
            $toAdd = [$toAdd];
        }

        return implode(PHP_EOL, $toAdd);
    }
}
