<?php

//https://rapidapi.com/skyscanner/api/skyscanner-flight-search?endpoint=5aa1eab3e4b00687d3574279
namespace App\Services;


use http\Client;
use http\Client\Request;

class RapidApiService
{
    private $client;
    private $request;

    public function __construct(Client $client, Request $request)
    {
        $this->client = $client;
        $this->request = $request;
    }


}
