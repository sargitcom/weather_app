<?php

namespace App\WeatherApp\Application\GetWeather;

class GetWeatherResponse
{
    public const IS_ERROR = true;
    public const IS_NO_ERROR = false;

    public function __construct(private bool $isError, private ?string $unit = null, private ?float $temperature = null) {}

    public function isError() : bool
    {
        return $this->isError;
    }

    public function getTemperature() : ?float
    {
        return $this->temperature;
    }

    public function getTemperatureUnit() : ?string
    {
        return $this->unit;
    }
}
