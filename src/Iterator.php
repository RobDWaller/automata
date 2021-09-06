<?php

declare(strict_types=1);

namespace Automata;

use Automata\Iterate;
use Automata\Iterations;
use Automata\Cells;
use Automata\Rules;

class Iterator
{
    public function __construct(
        private Iterate $iterate,
        private Cells $cells,
        private Rules $rules
    ) {
    }

    public function iterate(int $steps): Iterations
    {
        $count = 0;
        $iterations = new Iterations();
        $iterations->add($this->cells);

        while ($count < $steps) {
            $this->cells = $this->iterate->step($this->cells, $this->rules);
            $iterations->add($this->cells);
            $count++;
        }

        return $iterations;
    }

    public function iterateTo(int $steps): Cells
    {
        $count = 0;

        while ($count < $steps) {
            $this->cells = $this->iterate->step($this->cells, $this->rules);
            $count++;
        }

        return $this->cells;
    }
}
