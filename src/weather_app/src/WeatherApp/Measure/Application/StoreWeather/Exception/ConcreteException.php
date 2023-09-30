<?php

namespace App\WeatherApp\Application\StoreWeather\Exception;

use Exception;

class ConcreteException extends Exception implements ExceptionInterface
{
    public function isNullObject(): bool
    {
        return false;
    }
}