<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Automata\CellsFactory;
use Automata\Iterations;
use Automata\Cells;

class IterationsTest extends TestCase
{
    public function testAdd(): void
    {
        $iterations = new Iterations();

        $factory = new CellsFactory();
        $cells = $factory->create("10101");

        $iterations->add($cells);

        $this->assertCount(1, $iterations);
    }
}
