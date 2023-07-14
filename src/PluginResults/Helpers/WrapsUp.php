<?php

namespace Bellows\PluginSdk\PluginResults\Helpers;

use Closure;

trait WrapsUp
{
    protected ?Closure $wrapUp = null;

    public function wrapUp(Closure $cb): static
    {
        $this->wrapUp = $cb;

        return $this;
    }

    public function getWrapUp()
    {
        if ($this->wrapUp ?? null) {
            return ($this->wrapUp)();
        }

        return null;
    }
}
