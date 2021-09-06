<?php

declare(strict_types=1);

namespace Automata;

use Iterator;
use Countable;
use Automata\Cell;
use Automata\CellsException;

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
        return isset($this->cells[$this->key]);
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
        return array_key_exists($key, $this->cells) ?
            $this->cells[$key] :
            throw new CellsException('Cell could not be found please check the key provided.');
    }

    public function findPrevious(int $key): Cell
    {
        return $key === 0 ? $this->find(count($this->cells) - 1) : $this->find($key - 1);
    }

    public function findNext(int $key): Cell
    {
        return $key === (count($this->cells) - 1) ? $this->find(0) : $this->find($key + 1);
    }

    /**
     * @return int[]
     */
    public function toArray(): array
    {
        return array_reduce($this->cells, function ($carry, $cell) {
            $carry[] = $cell->getState();
            return $carry;
        }, []);
    }
}
