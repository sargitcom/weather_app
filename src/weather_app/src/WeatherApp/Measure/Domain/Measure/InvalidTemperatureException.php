<?php

namespace App\WeatherApp\Measure\Domain\Measure;

use InvalidArgumentException;
use Throwable;

class InvalidTemperatureException extends InvalidArgumentException
{
    public function __construct(float $temperature, Unit $unit, string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        if ($message !== "") {
            $message .= ",";
        }

        $unitSymbol = $unit->getUnit();
        $minTemperature = $unit->getMinTemperature();
        $maxTemperature = $unit->getMaxTemperature();

        $message .= "Temperature $temperature $unitSymbol is not in valid range $minTemperature - $maxTemperature exception";
    }
}
