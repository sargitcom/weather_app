<?php

namespace App\Controller;

use App\Form\Type\FormType;
use App\WeatherApp\Application\GetWeather\GetWeather;
use App\WeatherApp\Application\GetWeather\GetWeatherRequest;
use App\WeatherApp\Application\GetWeather\GetWeatherResponse;
use App\WeatherApp\Application\StoreWeather\StoreWeather;
use App\WeatherApp\Application\StoreWeather\StoreWeatherRequset;
use App\WeatherApp\Measure\Domain\ConcreteMeasure;
use App\WeatherApp\Measure\Domain\Location;
use App\WeatherApp\Measure\Domain\Measure\Temperature;
use App\WeatherApp\Measure\Domain\Measure\UnitFactory;
use App\WeatherApp\Measure\Infrastructure\Symfony\Measure\WeatherCache;
use DateTime;
use MeasureInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends AbstractController
{
    public function __construct(
        private GetWeather $getWeather, 
        private StoreWeather $storeWeather,
        private WeatherCache $weatherCache
    ) {}

    #[Route('/', methods: ['GET', 'POST'])]
    public function __invoke(Request $request) : Response
    {
        $form = $this->createForm(FormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $location = Location::create($data['city'] . ',' . $data['country']);

            return $this->getWeatherView($form, $location);
        }

        return $this->getView($form);
    }

    protected function getWeatherView(Form $form, Location $location) : Response
    {
        $cachedMeasure = $this->getWeatherFromCache($location);

        if (false && $cachedMeasure->isNullObject() === false && $this->isCacheObsolete($cachedMeasure->getTime()) === false) {
            return $this->render('form.html.twig', [
                'form' => $form,
                'temperature' => $cachedMeasure->getTemperature(),
                'temperatureUnit' => $cachedMeasure->getTemperatureUnit(),
            ]);
        }

        $newWeather = $this->getNewWeather($location);

        $measure = $this->getMeasure($location, $newWeather->getTemperature(), $newWeather->getTemperatureUnit());

        $this->persistsInDatabase($measure);
        //$this->persistsInCache($measure);

        return $this->render('form.html.twig', [
            'form' => $form,
            'temperature' => $measure->getTemperature(),
            'temperatureUnit' => $measure->getTemperatureUnit(),
        ]);
    }

    protected function getWeatherFromCache(Location $location) : MeasureInterface
    {
        return $this->weatherCache->getMeasure($location);
    }

    protected function isCacheObsolete(string $measureTime) : bool
    {
        $startDatetime = new DateTime(); 
        $diff = $startDatetime->diff(new DateTime($measureTime)); 
        return $diff->s >= 3600; // this is magic number - needs to be set by some factory - left for simplicity
    }

    protected function getNewWeather(Location $location) : GetWeatherResponse
    {
        $getWeatherRequest = new GetWeatherRequest($location->getLocation());
        return $this->getWeather->getWeather($getWeatherRequest);
    }

    protected function getMeasure(Location $location, float $temperature, string $temperatureUnit) : ConcreteMeasure
    {
        $concreteTemperatureUnit = UnitFactory::getByHandle($temperatureUnit);
        $concreteTemperature = Temperature::create($temperature, $concreteTemperatureUnit);
        
        return new ConcreteMeasure($concreteTemperature, $location, new DateTime);
    }

    protected function persistsInDatabase(ConcreteMeasure $concreteMeasure) : void
    {
        $this->storeWeather->storeWeather(
            new StoreWeatherRequset(
                $concreteMeasure->getLocation(),
                $concreteMeasure->getTemperature(),
                $concreteMeasure->getTemperatureUnit()
            )
        );
    }

    protected function persistsInCache(ConcreteMeasure $concreteMeasure) : void
    {
        $this->weatherCache->storeMeasure($concreteMeasure);
    }

    protected function getView(Form $form) : Response
    {
        return $this->render('form.html.twig', [
            'form' => $form,
        ]);
    }
}
