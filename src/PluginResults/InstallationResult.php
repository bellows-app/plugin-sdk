<?php

namespace Bellows\PluginSdk\PluginResults;

use Bellows\PluginSdk\Data\VendorPublish;
use Bellows\PluginSdk\PluginResults\Helpers\HasEnvironmentVariables;
use Bellows\PluginSdk\PluginResults\Helpers\WrapsUp;
use Bellows\PluginSdk\Values\RawValue;

class InstallationResult
{
    use HasEnvironmentVariables, WrapsUp;

    protected array $installationCommands = [];

    protected array $wrapUpCommands = [];

    protected array $composerPackages = [];

    protected array $composerDevPackages = [];

    protected array $npmPackages = [];

    protected array $npmDevPackages = [];

    protected array $vendorPublish = [];

    protected array $updateConfig = [];

    protected array $serviceProviders = [];

    protected array $aliases = [];

    protected array $composerScripts = [];

    protected array $allowedComposerPlugins = [];

    protected array $gitIgnore = [];

    protected array $directoriesToCopy = [];

    public static function create()
    {
        return new static;
    }

    public function installationCommand(string|RawValue $command): static
    {
        $this->installationCommands[] = $command;

        return $this;
    }

    public function installationCommands(array $commands): static
    {
        array_map($this->installationCommand(...), $commands);

        return $this;
    }

    public function wrapUpCommand(string|RawValue $command): static
    {
        $this->wrapUpCommands[] = $command;

        return $this;
    }

    public function wrapUpCommands(array $commands): static
    {
        array_map($this->wrapUpCommand(...), $commands);

        return $this;
    }

    public function composerPackage(string $package): static
    {
        $this->composerPackages[] = $package;

        return $this;
    }

    public function composerDevPackage(string $package): static
    {
        $this->composerDevPackages[] = $package;

        return $this;
    }

    public function composerPackages(array $packages): static
    {
        array_map($this->composerPackage(...), $packages);

        return $this;
    }

    public function composerDevPackages(array $packages): static
    {
        array_map($this->composerDevPackage(...), $packages);

        return $this;
    }

    public function npmPackage(string $package): static
    {
        $this->npmPackages[] = $package;

        return $this;
    }

    public function npmPackages(array $packages): static
    {
        array_map($this->npmPackage(...), $packages);

        return $this;
    }

    public function npmDevPackage(string $package): static
    {
        $this->npmDevPackages[] = $package;

        return $this;
    }

    public function npmDevPackages(array $packages): static
    {
        array_map($this->npmDevPackage(...), $packages);

        return $this;
    }

    public function publishTag(string $tag): static
    {
        $this->vendorPublish[] = ['tag' => $tag];

        return $this;
    }

    public function publishProvider(string $provider): static
    {
        $this->vendorPublish[] = ['provider' => $provider];

        return $this;
    }

    public function vendorPublish(VendorPublish ...$publish): static
    {
        collect($publish)
            ->map(fn (VendorPublish $publish) => $publish->toArray())
            ->filter(fn ($publish) => !empty($publish))
            ->each(fn ($publish) => $this->vendorPublish[] = $publish);

        return $this;
    }

    public function publishTags(array $tags): static
    {
        array_map($this->publishTag(...), $tags);

        return $this;
    }

    public function publishProviders(array $providers): static
    {
        array_map($this->publishProvider(...), $providers);

        return $this;
    }

    public function updateConfig(string $key, mixed $value): static
    {
        $this->updateConfig[$key] = $value;

        return $this;
    }

    public function updateConfigs(array $newConfig): static
    {
        foreach ($newConfig as $key => $value) {
            $this->updateConfig($key, $value);
        }

        return $this;
    }

    public function serviceProvider(string $provider): static
    {
        $this->serviceProviders[] = $provider;

        return $this;
    }

    public function serviceProviders(array $providers): static
    {
        array_map($this->serviceProvider(...), $providers);

        return $this;
    }

    public function alias(string $alias, string $target): static
    {
        $this->aliases[$alias] = $target;

        return $this;
    }

    public function aliases(array $aliases): static
    {
        foreach ($aliases as $alias => $target) {
            $this->alias($alias, $target);
        }

        return $this;
    }

    public function facade(string $facade, string $to): static
    {
        return $this->alias($facade, $to);
    }

    public function facades(array $facades): static
    {
        return $this->aliases($facades);
    }

    public function getAliases(): array
    {
        return $this->aliases;
    }

    public function getServiceProviders(): array
    {
        return $this->serviceProviders;
    }

    public function getVendorPublish(): array
    {
        return $this->vendorPublish;
    }

    public function getUpdateConfig(): array
    {
        return $this->updateConfig;
    }

    public function getInstallationCommands(): array
    {
        return $this->installationCommands;
    }

    public function getWrapUpCommands(): array
    {
        return $this->wrapUpCommands;
    }

    public function getComposerPackages(): array
    {
        return $this->composerPackages;
    }

    public function getComposerDevPackages(): array
    {
        return $this->composerDevPackages;
    }

    public function getNpmPackages(): array
    {
        return $this->npmPackages;
    }

    public function getNpmDevPackages(): array
    {
        return $this->npmDevPackages;
    }

    public function composerScript(string $event, string $command): static
    {
        $this->composerScripts[$event] ??= [];

        if (!in_array($command, $this->composerScripts[$event])) {
            $this->composerScripts[$event][] = $command;
        }

        return $this;
    }

    public function composerScripts(array $commands): static
    {
        foreach ($commands as $event => $command) {
            $this->composerScript($event, $command);
        }

        return $this;
    }

    public function getComposerScripts(): array
    {
        return $this->composerScripts;
    }

    public function allowComposerPlugin(string $plugin): static
    {
        $this->allowedComposerPlugins[] = $plugin;

        return $this;
    }

    public function allowComposerPlugins(array $plugins): static
    {
        foreach ($plugins as $plugin) {
            $this->allowComposerPlugin($plugin);
        }

        return $this;
    }

    public function getAllowedComposerPlugins(): array
    {
        return $this->allowedComposerPlugins;
    }

    public function gitIgnore(string|array $files): static
    {
        if (!is_array($files)) {
            $files = [$files];
        }

        $this->gitIgnore = array_merge($this->gitIgnore, $files);

        return $this;
    }

    public function getGitIgnore(): array
    {
        return $this->gitIgnore;
    }

    public function copyDirectory(string $dir): static
    {
        $this->directoriesToCopy[] = $dir;

        return $this;
    }

    public function copyDirectories(array $dirs): static
    {
        if (!is_array($dirs)) {
            $dirs = [$dirs];
        }

        foreach ($dirs as $dir) {
            $this->copyDirectory($dir);
        }

        return $this;
    }

    public function getDirectoriesToCopy(): array
    {
        return $this->directoriesToCopy;
    }
}
