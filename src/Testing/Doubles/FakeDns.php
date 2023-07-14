<?php

namespace Bellows\PluginSdk\Testing\Doubles;

use Bellows\PluginSdk\Testing\HandlesMockCalls;

class FakeDns
{
    use HandlesMockCalls;

    public function providerName(): string
    {
        return 'Fake DNS';
    }

    public function addARecord(string $name, string $value, int $ttl): bool
    {
        return $this->consume(__FUNCTION__, true);
    }

    public function addTXTRecord(string $name, string $value, int $ttl): bool
    {
        return $this->consume(__FUNCTION__, true);
    }

    public function addCNAMERecord(string $name, string $value, int $ttl): bool
    {
        return $this->consume(__FUNCTION__, true);
    }

    public function getARecord(string $name): ?string
    {
        return $this->consume(__FUNCTION__, null);
    }

    public function getTXTRecord(string $name): ?string
    {
        return $this->consume(__FUNCTION__, null);
    }

    public function getCNAMERecord(string $name): ?string
    {
        return $this->consume(__FUNCTION__, null);
    }

    public function available(): bool
    {
        return $this->consume(__FUNCTION__, true);
    }
}
