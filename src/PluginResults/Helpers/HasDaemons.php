<?php

namespace Bellows\PluginSdk\PluginResults\Helpers;

use Bellows\PluginSdk\Data\DaemonParams;

trait HasDaemons
{
    /** @var DaemonParams[] */
    protected array $daemons = [];

    public function daemon(DaemonParams $daemon): static
    {
        $this->daemons[] = $daemon;

        return $this;
    }

    /**
     * @param  iterable<DaemonParams>  $deaemons
     */
    public function daemons(iterable $daemons): static
    {
        collect($daemons)->each($this->daemon(...));

        return $this;
    }

    public function getDaemons(): array
    {
        return $this->daemons;
    }
}
