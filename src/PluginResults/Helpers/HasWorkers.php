<?php

namespace Bellows\PluginSdk\PluginResults\Helpers;

use Bellows\PluginSdk\Data\WorkerParams;

trait HasWorkers
{
    /** @var WorkerParams[] */
    protected array $workers = [];

    public function worker(WorkerParams $worker): static
    {
        $this->workers[] = $worker;

        return $this;
    }

    /**
     * @param  iterable<WorkerParams>  $workers
     */
    public function workers(iterable $workers): static
    {
        collect($workers)->each($this->worker(...));

        return $this;
    }

    public function getWorkers(): array
    {
        return $this->workers;
    }
}
