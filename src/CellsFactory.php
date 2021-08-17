<?php

declare(strict_types=1);

namespace Automata;

use Automata\Cells;
use Automata\Cell;

class CellsFactory
{
    public function create(string $cellPattern): Cells
    {
        $cells = new Cells();

        foreach (str_split($cellPattern) as $cellState) {
            $cells->add(new Cell((int) $cellState));
        }

        return $cells;
    }
}
