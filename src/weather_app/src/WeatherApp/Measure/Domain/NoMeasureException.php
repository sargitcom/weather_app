<?php

namespace App\WeatherApp\Measure\Domain;

use Exception;
use Throwable;

class NoMeasureException extends Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        if ($message !== "") {
            $message .= ",";
        }

        $message .= "No measure exception";
    }
}
