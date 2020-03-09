<?php

namespace App\Http\Controllers;


use App\Services\RapidApiService;
use App\Services\TravelPayoutsService;

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
     * @var TravelPayoutsService $travelPayoutService
     */
    private TravelPayoutsService $travelPayoutService;

    /**
     * FlightController constructor.
     *
     * @param  RapidApiService  $apiService
     */
    public function __construct(RapidApiService $apiService, TravelPayoutsService $travelPayooutService)
    {
        $this->apiService = $apiService;
        $this->travelPayoutService = $travelPayooutService;
    }

    /**
     *
     */
    public function getFlight()
    {
        return $this->apiService->getQuote2();
    }

    public function getAirports()
    {
        return $this->travelPayoutService->getAiroports();
    }
}
