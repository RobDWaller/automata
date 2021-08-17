<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Automata\RulesFactory;
use Automata\Rules;

class RulesFactoryTest extends TestCase
{
    public function testCreate(): void
    {
        $factory = new RulesFactory();

        $rules = $factory->create(110);

        $this->assertInstanceOf(Rules::class, $rules);
        $this->assertSame(110, $rules->describe());
    }

    public function testCreateRule30(): void
    {
        $factory = new RulesFactory();

        $rules = $factory->create(30);

        $this->assertInstanceOf(Rules::class, $rules);
        $this->assertSame(30, $rules->describe());
    }
}
