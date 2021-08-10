<?php

declare(strict_types=1);

namespace Automata;

use Iterator;
use Countable;
use Automata\RulesException;

/**
 * @implements Iterator<int, Rule>
 */
class Rules implements Iterator, Countable
{
    private int $key = 0;

    /**
     * @var Rule[] $rules
     */
    private array $rules = [];

    public function __construct()
    {
        $this->key = 0;
    }

    public function current(): Rule
    {
        return $this->rules[$this->key];
    }

    public function key(): int
    {
        return $this->key;
    }

    public function next(): void
    {
        $this->key++;
    }

    public function rewind(): void
    {
        $this->key = 0;
    }

    public function valid(): bool
    {
        return $this->current() instanceof Rule;
    }

    public function count(): int
    {
        return count($this->rules);
    }

    public function add(Rule $rule): void
    {
        $this->count() < 8 ?
            array_push($this->rules, $rule) :
            throw new RulesException("Collection may only contain a maximum of 8 rules.");
    }

    public function find(string $ruleKey): Rule
    {
        $rules = array_filter($this->rules, function (Rule $rule) use ($ruleKey) {
            return $rule->getKey() === $ruleKey;
        });

        return count($rules) === 1 ?
            array_values($rules)[0]
            : throw new RulesException("Rule cannot be found or is not unique.");
    }

    public function describe(): int
    {
        $binaryRule = array_reduce($this->rules, function ($carry, $rule) {
            $carry = $carry . $rule->getValue();
            return $carry;
        }, "");

        return (int) base_convert($binaryRule, 2, 10);
    }
}
