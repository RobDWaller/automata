<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Automata\CellsFactory;
use Automata\RulesFactory;
use Automata\Iterate;
use Automata\Cells;

class IterateTest extends TestCase
{
    public function testIterate(): void
    {
        $cellsFactory = new CellsFactory();
        $rulesFactory = new RulesFactory();
        $iterate = new Iterate();

        $cells = $iterate->step($cellsFactory->create("000"), $rulesFactory->create(110));

        $this->assertInstanceOf(Cells::class, $cells);
    }

    public function testIterate111(): void
    {
        $cellsFactory = new CellsFactory();
        $rulesFactory = new RulesFactory();
        $iterate = new Iterate();

        $cells = $iterate->step($cellsFactory->create("111"), $rulesFactory->create(110));

        $this->assertCount(3, $cells);
        $this->assertSame(0, $cells->find(0)->getState());
        $this->assertSame(0, $cells->find(1)->getState());
        $this->assertSame(0, $cells->find(2)->getState());
    }
}
