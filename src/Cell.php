<?php

declare(strict_types=1);

namespace Automata;

class Cell
{
    public function __construct(private int $state)
    {
    }

    public function getState(): int
    {
        return $this->state;
    }
}
