<?php

declare(strict_types=1);

namespace Automata;

use Iterator;
use Countable;
use Automata\CellsException;

/**
 * @implements Iterator<int, Cells>
 */
class Iterations implements Iterator, Countable
{
    private int $key = 0;

    /**
     * @var Cells[] $iterations
     */
    private array $iterations = [];

    public function __construct()
    {
        $this->key = 0;
    }

    public function current(): Cells
    {
        return $this->iterations[$this->key];
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
        return isset($this->iterations[$this->key]);
    }

    public function count(): int
    {
        return count($this->iterations);
    }

    public function add(Cells $cells): void
    {
        array_push($this->iterations, $cells);
    }

    public function toJson(): string
    {
        return (string) json_encode(
            array_reduce($this->iterations, function ($carry, $cells) {
                $carry[] = $cells->toArray();
                return $carry;
            }, [])
        );
    }
}
