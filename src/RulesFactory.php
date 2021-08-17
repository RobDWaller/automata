<?php

declare(strict_types=1);

namespace Automata;

use Automata\Rules;
use Automata\Rule;

class RulesFactory
{
    private const CELL_RULE = [
        "111",
        "110",
        "101",
        "100",
        "011",
        "010",
        "001",
        "000",
    ];

    public function create(int $rule): Rules
    {
        $binaryRule = str_pad(base_convert((string) $rule, 10, 2), 8, "0", STR_PAD_LEFT);

        $rules = new Rules();

        $i = 0;

        foreach (str_split($binaryRule) as $cellState) {
            $rules->add(new Rule(self::CELL_RULE[$i], (int) $cellState));
            $i++;
        }

        return $rules;
    }
}
