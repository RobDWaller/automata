<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Automata\Rules;
use Automata\Rule;

class RulesTest extends TestCase
{
    public function testAdd(): void
    {
        $rule = new Rule("000", 0);

        $rules = new Rules();

        $rules->add($rule);

        $this->assertCount(1, $rules);
    }
}