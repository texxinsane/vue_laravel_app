<?php


namespace App\Services;


use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;

class TravelPayoutsService
{
    private Client $client;
    private array $options;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->options = [
            'X-Auth-Token' => env('travelpayout_x_token')
        ];
    }

    public function getAiroports()
    {
        $request = $this->client->get(env('travelpayout_url').'data/en-GB/airports.json', $this->options);
        return new JsonResponse($request->getBody()->getContents());

    }
}