<?php

namespace App\WeatherApp\Measure\Infrastructure\Weather;

use App\WeatherApp\Measure\Domain\WeatherInterface;
use Iterator;

class WeatherClientsCollection implements Iterator
{
    private int $index = 0;
    
    /**
     * @var WeatherInterface[] $data
     */
    private array $data = [];

    public function append(WeatherInterface $weather) : void
    {
        $this->data[] = $weather;
    }

    public function current() : WeatherInterface
    {
        return $this->data[$this->index];
    }

    public function key() : int
    {
        return $this->index;
    }

    public function next() : void
    {
        $this->index++;
    }

    public function rewind() : void
    {
        $this->index = 0;
    }

    public function valid() : bool
    {
        return array_key_exists($this->index, $this->data);
    }

    public function getCount() : int
    {
        return count($this->data);
    }
}
