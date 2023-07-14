<?php

namespace Bellows\PluginSdk\Util;

use Bellows\PluginSdk\Contracts\EntityFactory;
use Bellows\PluginSdk\Facades\Console;
use Illuminate\Support\Collection;

class Entity implements EntityFactory
{
    protected Collection $items;

    protected string $fromExistingQuestion;

    protected string $keyToFind;

    protected $valueToFind;

    protected string $newItemChoice;

    protected string $newItemQuestion;

    protected $createNewCallback;

    public function from(Collection $items)
    {
        return (new static)->setItems($items);
    }

    public function setItems(Collection $items): static
    {
        $this->items = $items;

        return $this;
    }

    public function selectFromExisting(string $question, string $key, array|string|callable $value, string $newItemChoice): static
    {
        $this->fromExistingQuestion = $question;
        $this->keyToFind = $key;
        $this->valueToFind = $value;
        $this->newItemChoice = $newItemChoice;

        return $this;
    }

    public function createNew(string $question, callable $callback): static
    {
        $this->newItemQuestion = $question;
        $this->createNewCallback = $callback;

        return $this;
    }

    public function prompt(): mixed
    {
        $existing = $this->items->firstWhere($this->keyToFind, $this->valueToFind);

        if ($existing) {
            return $this->getFromExisting();
        }

        if ($this->items->isEmpty() || Console::confirm($this->newItemQuestion, true)) {
            return ($this->createNewCallback)();
        }

        return $this->getFromExisting();
    }

    protected function getFromExisting(): array
    {
        $item = Console::choiceFromCollection(
            $this->fromExistingQuestion,
            $this->items->sortBy($this->keyToFind)->push([
                $this->keyToFind => $this->newItemChoice,
            ]),
            $this->keyToFind,
            $this->valueToFind,
        );

        if ($item[$this->keyToFind] === $this->newItemChoice) {
            return ($this->createNewCallback)();
        }

        return $item;
    }
}
