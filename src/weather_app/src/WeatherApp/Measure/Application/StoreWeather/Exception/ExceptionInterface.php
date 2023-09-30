<?php

namespace App\WeatherApp\Application\StoreWeather\Exception;

interface ExceptionInterface
{
    public function isNullObject() : bool;
    public function getMessage() : string;
}
