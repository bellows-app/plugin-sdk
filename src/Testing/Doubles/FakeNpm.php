<?php

namespace Bellows\PluginSdk\Testing\Doubles;

class FakeNpm
{
    protected $installedPackages = [];

    protected $installedDevPackages = [];

    protected $scriptCommands = [];

    protected $packageManager = 'npm';

    public function install(string|array $package, bool $dev = false): void
    {
        if ($dev) {
            $this->installedDevPackages[] = $package;
        } else {
            $this->installedPackages[] = $package;
        }
    }

    public function installDev(string|array $package): void
    {
        $this->install($package, true);
    }

    public function getPackageManager(): ?string
    {
        return $this->packageManager;
    }

    public function packageIsInstalled(string $package): bool
    {
        return in_array($package, $this->installedPackages);
    }

    public function hasScriptCommand(string $command): bool
    {
        return isset($this->scriptCommands[$command]);
    }

    public function addScriptCommand(string $name, string $command): void
    {
        $this->scriptCommands[$name] = $command;
    }

    public function setPackageManager(string $packageManager): void
    {
        $this->packageManager = $packageManager;
    }
}
