# weather_app

## installation & application run

in .env provide open weather map API key (in field OPEN_WEATHER_API_KEY)

run docker with `sudo docker-compose up -d --build`

open app in web browser 'http://localhost'

## task

    Create a simple Symfony 6 site where a user will be able to provide his city and country via form and after submission system will display current weather forecast.

    Forecast temperature should be calculated as an average based on different APIs, at least 2 different data sources (ex. API1 will return temperature 25, API2 will return temperature 27 so the result should be (25+27)/2 ie. 26)

    Feel free to use https://openweathermap.org/API   and any other API you like.

    Few notes:
    - please implement proper error handling
    - results should be stored in the database
    - a simple caching mechanism should be added
    - ability to easily add new data sources (how to register them, interfaces etc.)
    - clean data separation
    - nice to have - latest PHP mechanisms (ex. traits)
