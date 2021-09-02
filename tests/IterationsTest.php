<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Automata\CellsFactory;
use Automata\Iterations;
use Automata\IterationsException;
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

    public function testToJson(): void
    {
        $iterations = new Iterations();

        $factory = new CellsFactory();
        $cells1 = $factory->create("11101");
        $cells2 = $factory->create("00001");
        $cells3 = $factory->create("10001");

        $iterations->add($cells1);
        $iterations->add($cells2);
        $iterations->add($cells3);

        $this->assertJsonStringEqualsJsonString(
            (string) json_encode(
                [
                    [1, 1, 1, 0, 1],
                    [0, 0, 0, 0, 1],
                    [1, 0, 0, 0, 1],
                ]
            ),
            $iterations->toJson()
        );
    }

    public function testFind(): void
    {
        $iterations = new Iterations();

        $factory = new CellsFactory();
        $cells1 = $factory->create("10101");
        $cells2 = $factory->create("01001");

        $iterations->add($cells1);
        $iterations->add($cells2);

        $cells = $iterations->find(1);

        $this->assertSame(0, $cells->find(0)->getState());
        $this->assertSame(1, $cells->find(1)->getState());
        $this->assertSame(0, $cells->find(2)->getState());
    }

    public function testFindFail(): void
    {
        $iterations = new Iterations();

        $factory = new CellsFactory();
        $cells1 = $factory->create("10101");
        $cells2 = $factory->create("01001");

        $iterations->add($cells1);
        $iterations->add($cells2);

        $this->expectException(IterationsException::class);
        $this->expectExceptionMessage("Cells could not be found please check the key provided.");
        $iterations->find(2);
    }
}
