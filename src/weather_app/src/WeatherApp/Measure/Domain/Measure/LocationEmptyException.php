<?php

namespace App\WeatherApp\Measure\Domain\Measure;

use Throwable;
use InvalidArgumentException;

class LocationEmptyException extends InvalidArgumentException
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        if ($message !== "") {
            $message .= ",";
        }

        $message .= "Location empty exception";
    }
}
