<?php

namespace App\WeatherApp\Application\StoreWeather\Exception;

use Exception;
use Throwable;

class ErrorDuringSaveException extends Exception implements ExceptionInterface
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        if ($message !== "") {
            $message .= ",";
        }

        $message .= "Error during measure save exception";
    }

    public function isNullObject(): bool
    {
        return false;
    }
}