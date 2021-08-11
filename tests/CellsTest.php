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

    public function testFind(): void
    {
        $cells = new Cells();

        $cells->add(new Cell(1));
        $cells->add(new Cell(0));
        $cells->add(new Cell(0));

        $this->assertSame(0, $cells->find(1)->getState());
    }

    public function testFindPrevious(): void
    {
        $cells = new Cells();

        $cells->add(new Cell(1));
        $cells->add(new Cell(0));
        $cells->add(new Cell(0));

        $this->assertSame(1, $cells->findPrevious(1)->getState());
    }

    public function testFindPreviousKeyZero(): void
    {
        $cells = new Cells();

        $cells->add(new Cell(1));
        $cells->add(new Cell(0));
        $cells->add(new Cell(0));

        $this->assertSame(0, $cells->findPrevious(0)->getState());
    }
}
