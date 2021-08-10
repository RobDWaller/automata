<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Automata\Cells;
use Automata\Cell;

class CellsTest extends TestCase
{
    public function testAddCell(): void
    {
        $cells = new Cells();

        $cells->add(new Cell(1));

        $this->assertCount(1, $cells);
    }
}
