<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Automata\Cell;
use Automata\RulesFactory;

class CellTest extends TestCase
{
    public function testGetState(): void
    {
        $cell = new Cell(0);

        $this->assertSame(0, $cell->getState());
    }

    public function testEvaluate000(): void
    {
        $factory = new RulesFactory();
        $rules = $factory->create(110);

        $left = new Cell(0);
        $cell = new Cell(0);
        $right = new Cell(0);

        $result = $cell->evaluate($left, $right, $rules);

        $this->assertSame(0, $result->getState());
    }

    public function testEvaluate001(): void
    {
        $factory = new RulesFactory();
        $rules = $factory->create(110);

        $left = new Cell(0);
        $cell = new Cell(0);
        $right = new Cell(1);

        $result = $cell->evaluate($left, $right, $rules);

        $this->assertSame(1, $result->getState());
    }

    public function testEvaluate111(): void
    {
        $factory = new RulesFactory();
        $rules = $factory->create(110);

        $left = new Cell(1);
        $cell = new Cell(1);
        $right = new Cell(1);

        $result = $cell->evaluate($left, $right, $rules);

        $this->assertSame(0, $result->getState());
    }
}
