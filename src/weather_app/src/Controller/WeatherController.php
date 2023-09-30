<?php

namespace App\Controller;

use App\WeatherApp\Application\GetWeather\GetWeather;
use App\WeatherApp\Application\StoreWeather\StoreWeather;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WeatherController extends AbstractController
{
    public function __construct(
        private GetWeather $getWeather, 
        private StoreWeather $storeWeather
    ) {}

    public function __invoke(Request $request) : Response
    {
         return new JsonResponse();
    }
}
