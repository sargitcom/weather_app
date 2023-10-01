<?php

namespace App\WeatherApp\Application\StoreWeather;

use App\WeatherApp\Measure\Domain\Measure\ConcreteMeasure;
use App\WeatherApp\Measure\Domain\Measure\Location;
use App\WeatherApp\Measure\Domain\Measure\Temperature;
use App\WeatherApp\Measure\Domain\Measure\UnitFactory;
use DateTime;

class StoreWeatherRequest
{
    private function __construct(
        private string $location,
        private float $temperature,
        private string $temperatureUnit
    ) {}

    public static function create(
        string $location,
        float $temperature,
        string $temperatureUnit
    ) : self {
        return new self($location, $temperature, $temperatureUnit);
    }

    public function getConcreteWeather() : ConcreteMeasure
    {
        $concreteTemperature = Temperature::create($this->temperature, UnitFactory::getByHandle($this->temperatureUnit));
        $concreteLocation = Location::create($this->location);

        return new ConcreteMeasure($concreteTemperature, $concreteLocation, new DateTime());
    }
}