<?php

declare(strict_types=1);

namespace Automata;

use Iterator;
use Countable;
use Automata\IterationsException;

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

    public function find(int $key): Cells
    {
        return array_key_exists($key, $this->iterations) ?
            $this->iterations[$key] :
            throw new IterationsException('Cells could not be found please check the key provided.');
    }

    /**
     * @return mixed[]
     */
    public function toArray(): array
    {
        return array_reduce($this->iterations, function ($carry, $cells) {
            $carry[] = $cells->toArray();
            return $carry;
        }, []);
    }
}
