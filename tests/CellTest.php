<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Automata\Cell;

class CellTest extends TestCase
{
    public function testGetState(): void
    {
        $cell = new Cell(0);

        $this->assertSame(0, $cell->getState());
    }

    public function testEvaluate000(): void
    {
        $cell = new Cell(0);
        $left = new Cell(0);
        $right = new Cell(0);

        $result = $cell->evaluate($left, $right);

        $this->assertSame(0, $result->getState());
    }
}
