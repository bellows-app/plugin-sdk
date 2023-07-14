<?php

namespace Bellows\PluginSdk\Testing\Doubles;

use Illuminate\Support\Collection;
use Illuminate\Testing\Assert;

class FakeConsole
{
    protected array $expectedQuestions = [];

    protected array $expectedPartialOutput = [];

    protected array $expectedOutput = [];

    public function shouldReceiveQuestion(string $question, string $answer = null): void
    {
        $this->expectedQuestions[] = [$question, $answer];
    }

    public function outputShouldContain(string $output): void
    {
        $this->expectedPartialOutput[] = $output;
    }

    public function shouldReceiveOutput(string $output): void
    {
        $this->expectedOutput[] = $output;
    }

    public function ask(string $question, string $default = null)
    {
        [$expectedQuestion, $expectedAnswer] = array_shift($this->expectedQuestions);

        Assert::assertEquals($expectedQuestion, $question, "Expected question '{$expectedQuestion}', got '{$question}'");

        return $expectedAnswer;
    }

    public function confirm(string $question, string $default = null)
    {
        return $this->ask($question, $default === 'yes');
    }

    public function askRequired(string $question, ...$args)
    {
        return $this->ask($question);
    }

    public function secret(string $question, ...$args)
    {
        return $this->ask($question);
    }

    public function askForNumber(string $question, ...$args)
    {
        return $this->ask($question);
    }

    public function choice(string $question, array $choices)
    {
        $answer = $this->ask($question);

        if (in_array($answer, $choices) || array_key_exists($answer, $choices)) {
            return $answer;
        }

        Assert::assertContains(
            $answer,
            $choices,
            'Expected answer to be one of: ' . implode(', ', $choices) . ", got '{$answer}'"
        );

        return $answer;
    }

    public function choiceFromCollection(
        $question,
        Collection $collection,
        string $labelKey,
        array|string|callable $default = null,
        $attempts = null,
        $multiple = false
    ) {
        $answer = $this->ask($question);

        return $collection->firstWhere($labelKey, $answer);
    }

    public function miniTask(string $key, string $value, bool $successful = true): void
    {
        $fullOutput = "{$key}: {$value}";

        $this->checkForOutput($fullOutput);
    }

    public function validate()
    {
        Assert::assertCount(
            0,
            $this->expectedPartialOutput,
            count($this->expectedPartialOutput) ?
                "Expected partial output '{$this->expectedPartialOutput[0]}' not found" : '',
        );

        Assert::assertCount(
            0,
            $this->expectedOutput,
            count($this->expectedOutput) ?
                "Expected output '{$this->expectedOutput[0]}' not found" : '',
        );

        Assert::assertCount(
            0,
            $this->expectedQuestions,
            count($this->expectedQuestions) ?
                "Expected question '{$this->expectedQuestions[0][0]}' was not asked" : '',
        );
    }

    protected function checkForOutput(string $checkFor): void
    {
        $this->checkForPartialOutput($checkFor);
        $this->checkForFullOutput($checkFor);
    }

    protected function checkForPartialOutput(string $checkFor): void
    {
        $index = collect($this->expectedPartialOutput)->search(
            fn ($output) => str_contains($checkFor, $output)
        );

        if ($index !== false) {
            unset($this->expectedPartialOutput[$index]);
        }
    }

    protected function checkForFullOutput(string $checkFor): void
    {
        $index = collect($this->expectedOutput)->search(
            fn ($output) => $output === $checkFor
        );

        if ($index !== false) {
            unset($this->expectedOutput[$index]);
        }
    }

    public function __call($name, $arguments)
    {
        if (in_array($name, ['info', 'comment', 'error', 'warn', 'success'])) {
            return $this->checkForOutput($arguments[0]);
        }

        if (in_array($name, ['line', 'newLine'])) {
            return;
        }

        if ($name === 'table') {
            // TODO: Handle? Probably not necessary.
            // Are we really testing table output?
            return;
        }

        // At this point we're dealing with just output
        dd('got to an unknown method', $name, $arguments);
    }
}
