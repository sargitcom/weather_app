<?php

namespace App\WeatherApp\Application\StoreWeather;

use Throwable;

class StoreWeatherResponse
{
    private bool $isError;
    private ExceptionInterface $exception;

    private function __construct(StoreWeatherResponseBuilder $builder)
    {
        $this->isError = $builder->;
        $this->exception = $exception;
    }
}