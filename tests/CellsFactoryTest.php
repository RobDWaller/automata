<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Automata\CellsFactory;

class CellsFactoryTest extends TestCase
{
    public function testCreateCells(): void
    {
        $factory = new CellsFactory();

        $cells = $factory->create("01010");

        $this->assertCount(5, $cells);
    }
}
