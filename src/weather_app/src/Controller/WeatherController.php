<?php

namespace App\Controller;

use App\Form\Type\FormType;
use App\WeatherApp\Application\GetWeather\GetWeather;
use App\WeatherApp\Application\GetWeather\GetWeatherRequest;
use App\WeatherApp\Application\StoreWeather\StoreWeather;
use App\WeatherApp\Measure\Domain\ConcreteMeasure;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends AbstractController
{
    public function __construct(
        private GetWeather $getWeather, 
        private StoreWeather $storeWeather
    ) {}

    #[Route('/', methods: ['GET', 'POST'])]
    public function __invoke(Request $request) : Response
    {

        $form = $this->createForm(FormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            
            $location = $data['city'] . ',' . $data['country'];

            $getWeatherRequest = new GetWeatherRequest($location);

            $weatherResponse = $this->getWeather->getWeather($getWeatherRequest);

            //return $this->redirectToRoute('task_success');
        }

        return $this->render('form.html.twig', [
            'form' => $form,
        ]);
    }
}
