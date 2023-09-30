<?php

namespace App\WeatherApp\Measure\Domain\Measure;

use InvalidArgumentException;
use Throwable;

class UnknownTemperatureUnitException extends InvalidArgumentException
{
    public function __construct(string $handle, string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        if ($message !== "") {
            $message .= ",";
        }

        $message .= "Unknown temperature unit `$handle` exception";
    }
}
