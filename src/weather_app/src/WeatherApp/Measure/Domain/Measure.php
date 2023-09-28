<?php

namespace App\WeatherApp\Measure\Domain;

use App\WeatherApp\Measure\Domain\Measure\Temperature;
use App\WeatherApp\Measure\Domain\Measure\Unit;
use DateTime;

class Measure
{
    private Temperature $temperature;
    private Location $location;
    private DateTime $time;

    public function __construct(
        Temperature $temperature,
        Location $location,
        DateTime $time,
    ) {
        $this->temperature = $temperature;
        $this->location = $location;
        $this->time = $time;
    }

    public function getTemperature() : float
    {
        return $this->temperature->getTemperature();
    }

    public function getUnit() : string
    {
        return $this->temperature->getUnit();
    }

    public function getLocation() : string
    {
        return $this->location;
    }
}