<?php

declare(strict_types=1);

namespace Automata;

use Iterator;
use Countable;
use Automata\Cell;

/**
 * @implements Iterator<int, Cell>
 */
class Cells implements Iterator, Countable
{
    private int $key = 0;

    /**
     * @var Cell[] $cells
     */
    private array $cells = [];

    public function __construct()
    {
        $this->key = 0;
    }

    public function current(): Cell
    {
        return $this->cells[$this->key];
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
        return $this->current() instanceof Cell;
    }

    public function count(): int
    {
        return count($this->cells);
    }

    public function add(Cell $cell): void
    {
        array_push($this->cells, $cell);
    }

    public function find(int $key): Cell
    {
        return $this->cells[$key];
    }
}
