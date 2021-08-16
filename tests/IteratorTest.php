<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Automata\CellsFactory;
use Automata\RulesFactory;
use Automata\Iterator;
use Automata\Iterate;
use Automata\Cells;

class IteratorTest extends TestCase
{
    public function testIterate(): void
    {
        $cellsFactory = new CellsFactory();
        $cells = $cellsFactory->create("01010");

        $rulesFactory = new RulesFactory();
        $rules = $rulesFactory->create(110);

        $iterator = new Iterator(new Iterate(), $cells, $rules);

        $result = $iterator->iterate(4);

        $this->assertInstanceOf(Cells::class, $result);
    }

    public function testIterateThreeSteps(): void
    {
        $cellsFactory = new CellsFactory();
        $cells = $cellsFactory->create("01010");

        $rulesFactory = new RulesFactory();
        $rules = $rulesFactory->create(110);

        $iterator = new Iterator(new Iterate(), $cells, $rules);

        $result = $iterator->iterate(3);

        $this->assertSame(1, $result->find(0)->getState());
        $this->assertSame(0, $result->find(1)->getState());
        $this->assertSame(1, $result->find(2)->getState());
        $this->assertSame(1, $result->find(3)->getState());
        $this->assertSame(0, $result->find(4)->getState());
    }
}
