<?php

declare(strict_types=1);

namespace Automata;

use \Iterator;
use \Countable;

class Rules implements Iterator, Countable
{
    private array $rules = [];

    public function current(): Rule
    {
        return current($this->rules);
    }

    public function key(): int
    {
        return key($this->rules);
    }

    public function next(): void
    {
        next($this->rules);
    }

    public function rewind(): void
    {
        rewind($this->rules);
    }

    public function valid(): bool
    {
        return $this->current() instanceof Rule;
    }

    public function count(): int
    {
        return count($this->rules);
    }

    public function add(Rule $rule): void
    {
        array_push($this->rules, $rule);
    }
}