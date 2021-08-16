<?php

declare(strict_types=1);

namespace Automata;

use Automata\Iterate;
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

    public function iterate(int $steps): Cells
    {
        return new Cells();
    }
}
