<?php

namespace Bellows\PluginSdk\Testing\Doubles;

class FakeComposer
{
    protected $installedPackages = [];

    protected $installedDevPackages = [];

    public function require(string|array $package, bool $dev = false, string $flags = null): void
    {
        if ($dev) {
            $this->installedDevPackages[] = $package;
        } else {
            $this->installedPackages[] = $package;
        }
    }

    public function requireDev(string|array $package): void
    {
        $this->require($package, true);
    }

    public function packageIsInstalled(string $package): bool
    {
        return in_array($package, $this->installedPackages);
    }
}
