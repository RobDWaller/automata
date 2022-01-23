<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Automata\Automata;

class AutomataTest extends TestCase
{
    public function testGenerate(): void
    {
        $automata = new Automata();

        $result = $automata->generate(110, 4, '01010');

        $this->assertCount(5, $result);
        $this->assertSame(1, $result->find(3)->find(0)->getState());
        $this->assertSame(0, $result->find(3)->find(1)->getState());
        $this->assertSame(1, $result->find(3)->find(2)->getState());
        $this->assertSame(1, $result->find(3)->find(3)->getState());
        $this->assertSame(0, $result->find(3)->find(4)->getState());
    }
}
