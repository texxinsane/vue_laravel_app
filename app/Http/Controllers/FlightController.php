<?php

namespace App\Http\Controllers;

use App\Services\RapidApiService;

class FlightController extends Controller
{
    private $apiService;

    public function __construct(RapidApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function getFlight()
    {
        exit('axc');
        $this->apiService->getQuote();
    }
}
