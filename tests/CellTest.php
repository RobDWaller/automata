<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Automata\Cell;

class CellTest extends TestCase
{
    public function testGetState()
    {
        $cell = new Cell(0);

        $this->assertSame(0, $cell->getState());
    }
}