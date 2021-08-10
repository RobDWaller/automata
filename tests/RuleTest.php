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
}