<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Automata\Rule;

class RuleTest extends TestCase
{
    public function testGetKey(): void
    {
        $rule = new Rule("000", 0);

        $this->assertSame("000", $rule->getKey());
    }

    public function testGetValue(): void
    {
        $rule = new Rule("001", 1);

        $this->assertSame(1, $rule->getValue());
    }
}
