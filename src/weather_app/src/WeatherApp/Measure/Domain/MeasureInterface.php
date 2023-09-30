<?php

interface MeasureInterface
{
    public function isNullObject() : bool;
    public function getTemperature() : float;
    public function getTemperatureUnit() : string;
    public function getTime() : string;
    public function getLocation() : string;
}
