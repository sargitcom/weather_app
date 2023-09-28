<?php

namespace App\WeatherApp\Measure\Domain\Measure;

class Temperature
{
    private float $temperature;
    private Unit $unit;

    private function __construct(float $temperature, Unit $unit)
    {
        $this->assertValidTemperature($temperature, $unit);
        $this->setTemperature($temperature);
        $this->setUnit($unit);
    }

    protected function assertValidTemperature(float $temperature, Unit $unit)
    {
        if ($temperature >= $unit->getMinTemperature() && $temperature <= $unit->getMaxTemperature()) {
            return;
        }

        throw new InvalidTemperatureException($temperature, $unit);
    }
    
    protected function setTemperature($temperature) : void
    {
        $this->temperature = $temperature;
    }

    protected function setUnit(Unit $unit) : void
    {
        $this->unit = $unit;
    }

    public function getTemperature() : float
    {
        return $this->temperature;
    }

    public function getUnit() : string
    {
        return $this->unit->getUnit();
    }
}
