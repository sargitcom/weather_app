<?php

namespace App\WeatherApp\Application\StoreWeather\Exception;

use Exception;

class NoException implements ExceptionInterface
{
    public function isNullObject(): bool
    {
        return true;
    }

    public function getMessage(): string
    {
        throw new Exception("No exception exception");
    }
}
