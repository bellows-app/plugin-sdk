<?php

namespace Bellows\PluginSdk\PluginResults\Helpers;

use Bellows\PluginSdk\Data\JobParams;

trait HasJobs
{
    /** @var JobParams[] */
    protected array $jobs = [];

    public function job(JobParams $job): static
    {
        $this->jobs[] = $job;

        return $this;
    }

    /**
     * @param  iterable<JobParams>  $jobs
     */
    public function jobs(iterable $jobs): static
    {
        collect($jobs)->each($this->job(...));

        return $this;
    }

    public function getJobs(): array
    {
        return $this->jobs;
    }
}
