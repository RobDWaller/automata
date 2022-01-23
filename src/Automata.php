<?php

declare(strict_types=1);

namespace Automata;

use Automata\CellsFactory;
use Automata\RulesFactory;
use Automata\Iterator;
use Automata\Iterations;

class Automata
{
    public function generate(int $rule, int $steps, string $initialState): Iterations
    {
        $cellsFactory = new CellsFactory();
        $cells = $cellsFactory->create($initialState);

        $rulesFactory = new RulesFactory();
        $rules = $rulesFactory->create($rule);

        $iterator = new Iterator(new Iterate(), $cells, $rules);

        return $iterator->iterate($steps);
    }
}
