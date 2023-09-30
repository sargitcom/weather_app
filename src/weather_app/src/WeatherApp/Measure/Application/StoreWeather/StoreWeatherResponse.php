<?php

namespace App\WeatherApp\Application\StoreWeather;

use App\WeatherApp\Application\StoreWeather\Exception\ExceptionInterface;
use Throwable;

class StoreWeatherResponse
{
    private bool $isError;
    private ExceptionInterface $exception;

    private function __construct(StoreWeatherResponseBuilder $builder)
    {
        $this->isError = $builder->isError();
        $this->exception = $builder->getException();
    }

    public static function getBuilder() : StoreWeatherResponseBuilder
    {
        return new StoreWeatherResponseBuilder;
    }

    public function isError() : bool
    {
        return $this->isError;
    }

    public function getException() : ExceptionInterface
    {
        return $this->exception;
    }
}