<?php

declare(strict_types=1);

namespace Automata;

use \Iterator;
use \Countable;
use Automata\RulesException;

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
        $this->count() < 8 ?
            array_push($this->rules, $rule):
            throw new RulesException("Collection may only contain a maximum of 8 rules.");
    }
}