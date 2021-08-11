<?php

declare(strict_types=1);

namespace Automata;

use Automata\Cells;
use Automata\Rules;

class Iterate
{
    public function step(Cells $cells, Rules $rules): Cells
    {
        return new Cells();
    }
}
