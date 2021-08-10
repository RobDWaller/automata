<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Automata\Rules;
use Automata\Rule;
use Automata\RulesException;

class RulesTest extends TestCase
{
    public function testAdd(): void
    {
        $rule = new Rule("000", 0);

        $rules = new Rules();

        $rules->add($rule);

        $this->assertCount(1, $rules);
    }

    public function testAddMax(): void
    {
        $rules = new Rules();
        $rules->add(new Rule("000", 0));
        $rules->add(new Rule("001", 1));
        $rules->add(new Rule("010", 1));
        $rules->add(new Rule("011", 1));
        $rules->add(new Rule("100", 0));
        $rules->add(new Rule("101", 1));
        $rules->add(new Rule("110", 1));
        $rules->add(new Rule("111", 0));

        $this->expectException(RulesException::class);
        $this->expectExceptionMessage("Collection may only contain a maximum of 8 rules.");
        $rules->add(new Rule("000", 0));
    }
}