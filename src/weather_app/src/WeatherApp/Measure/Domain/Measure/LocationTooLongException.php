<?php

namespace App\WeatherApp\Measure\Domain\Measure;

use Throwable;
use InvalidArgumentException;

class LocationTooLongException extends InvalidArgumentException
{
    public function __construct(string $location, string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        if ($message !== "") {
            $message .= ",";
        }

        $message .= "Location `$location` to long exception";
    }
}
