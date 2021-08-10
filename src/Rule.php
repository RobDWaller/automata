<?php

declare(strict_types=1);

namespace Automata;

class Rule
{
    public function __construct(private string $key, private int $value){}

    public function getKey(): string
    {
        return $this->key;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}