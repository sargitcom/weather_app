<?php

namespace App\WeatherApp\Measure\Domain;

use App\WeatherApp\Measure\Domain\Measure\Temperature;
use App\WeatherApp\Measure\Domain\Measure\Unit;
use DateTime;
use MeasureInterface;

class ConcreteMeasure implements MeasureInterface
{
    public function __construct(
        private Temperature $temperature,
        private Location $location,
        private DateTime $time,
    ) {}

    public function getTemperature() : float
    {
        return $this->temperature->getTemperature();
    }

    public function getTemperatureUnit() : string
    {
        return $this->temperature->getUnit();
    }

    public function getLocation() : string
    {
        return $this->location->getLocation();
    }

    public function getTime() : string
    {
        return $this->time->format('Y-m-d H:i:s');
    }

    public function isNullObject(): bool
    {
        return false;
    }
}