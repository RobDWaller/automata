<?php

declare(strict_types=1);

namespace Automata;

use Automata\Rules;

class Cell
{
    public function __construct(private int $state)
    {
    }

    public function getState(): int
    {
        return $this->state;
    }

    public function evaluate(Cell $left, Cell $right, Rules $rules): Cell
    {
        $rule = $rules->find("{$left->getState()}{$this->getState()}{$right->getState()}");
        return new Cell($rule->getValue());
    }
}
