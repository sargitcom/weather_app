<?php

namespace App\WeatherApp\Measure\Domain\Measure;

abstract class Unit
{
    abstract public function getUnit() : string;
    abstract public function getMinTemperature() : float;
    abstract public function getMaxTemperature() : float;

    public function __toString()
    {
        return $this->getUnit();
    }
}
