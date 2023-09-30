<?php

namespace App\WeatherApp\Application\StoreWeather;

use App\WeatherApp\Application\StoreWeather\Exception\ExceptionInterface;
use App\WeatherApp\Application\StoreWeather\Exception\NoException;

class StoreWeatherResponseBuilder
{
    private bool $isError;
    private ExceptionInterface $exception;

    public function __construct()
    {
        $this->init();
    }

    protected function init()
    {
        $this->setNoError();
        $this->setNoException();
    }

    protected function setNoError()
    {
        $this->isError = false;
    }

    protected function setNoException()
    {
        $this->exception = new NoException();
    }

    public function build() : StoreWeatherResponse
    {
        return new StoreWeatherResponse($this);
    }

    public function setIsError() : self
    {
        $this->isError = true;
        return $this;
    }

    public function setException(ExceptionInterface $exception) : self
    {
        $this->exception = $exception;
        return $this;
    }

    public function isError() : bool
    {
        return $this->isError();
    }

    public function getException() : ExceptionInterface
    {
        return $this->exception;
    }
}
