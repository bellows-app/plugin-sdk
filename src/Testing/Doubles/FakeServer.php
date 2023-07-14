<?php

namespace Bellows\PluginSdk\Testing\Doubles;

use Bellows\PluginSdk\Contracts\ServerProviders\ServerInterface;
use Bellows\PluginSdk\Data\Server;
use Bellows\PluginSdk\Testing\HandlesMockCalls;
use Illuminate\Support\Collection;

class FakeServer implements ServerInterface
{
    use HandlesMockCalls;

    public function sites(): Collection
    {
        return $this->consume(__FUNCTION__, collect());
    }

    public function hasDaemon(string $command): bool
    {
        return $this->consume(__FUNCTION__, false);
    }

    public function hasJob(string $command): bool
    {
        return $this->consume(__FUNCTION__, false);
    }

    public function data(): Server
    {
        return $this->consume(
            __FUNCTION__,
            Server::from([
                'id'         => 1,
                'name'       => 'Test Server',
                'type'       => 'php',
                'ip_address' => '127.0.0.1',
            ]),
        );
    }
}
