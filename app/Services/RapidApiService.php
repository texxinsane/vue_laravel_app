<?php

//https://rapidapi.com/skyscanner/api/skyscanner-flight-search?endpoint=5aa1eab3e4b00687d3574279
namespace App\Services;


use http\Client;
use http\Client\Request;
use http\QueryString;

class RapidApiService
{
    private $client;
    private $request;

    public function __construct(Client $client, Request $request)
    {
        $this->client = $client;
        $this->request = $request;
    }

    public function getQuote()
    {
        $this->request->setRequestUrl('https://skyscanner-skyscanner-flight-search-v1.p.rapidapi.com/apiservices/browsequotes/v1.0/US/USD/en-US/SFO-sky/JFK-sky/2019-09-01');
        $this->request->setRequestMethod('GET');
        $this->request->setQuery(new QueryString(array(
            'inboundpartialdate' => '2019-12-01'
        )));

        $this->request->setHeaders(array(
            'x-rapidapi-host' => 'skyscanner-skyscanner-flight-search-v1.p.rapidapi.com',
            'x-rapidapi-key' => '7b9cc0b909msha806746af26d7bbp1c5893jsnc137aac68c19'
        ));

        $this->client->enqueue($this->request)->send();
        $response = $this->client->getResponse();

        echo $response->getBody();

        $url = 'https://skyscanner-skyscanner-flight-search-v1.p.rapidapi.com/apiservices/browsequotes/v1.0/US/USD/en-US/SFO-sky/JFK-sky/2019-09-01';
    }




}
