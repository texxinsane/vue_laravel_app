<?php

namespace App\Http\Controllers;


use App\Services\RapidApiService;

/**
 * Class FlightController
 *
 * @package App\Http\Controllers
 */
class FlightController extends Controller
{

    /**
     * @var RapidApiService $apiService
     */
    private RapidApiService $apiService;

    /**
     * FlightController constructor.
     *
     * @param  RapidApiService  $apiService
     */
    public function __construct(RapidApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    /**
     *
     */
    public function getFlight()
    {
        return $this->apiService->getQuote();
    }
}
