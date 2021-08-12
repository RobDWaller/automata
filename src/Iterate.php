<?php

declare(strict_types=1);

namespace Automata;

use Automata\Cells;
use Automata\Rules;

class Iterate
{
    public function step(Cells $cells, Rules $rules): Cells
    {
        $newCells = new Cells();

        foreach ($cells as $key => $cell) {
            $left = $cells->findPrevious($key);
            $right = $cells->findNext($key);
            $newCells->add($cell->evaluate($left, $right, $rules));
        }

        return $newCells;
    }
}
