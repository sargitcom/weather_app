<?php

namespace App\WeatherApp\Measure\Domain\Measure;

use Exception;
use Throwable;

class CantSaveItemInCacheException extends Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        if ($message !== "") {
            $message .= ",";
        }

        $message .= "Cant save in cache exception";
    }
}
