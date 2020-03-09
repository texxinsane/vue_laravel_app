<?php

namespace App\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        $response = [
                ['id' => 1, 'name' => 'Ionut', 'color' => 'red'],
        ];
        return new JsonResponse($response);
//        return $request->getBaseUrl();
    }

    public function create()
    {
        return new JsonResponse([]);
    }

    public function delete()
    {
        return new JsonResponse([]);
    }

    public function update()
    {
        $response = [['id'=>1,'name'=>'Ionut','color'=>'green']];
        return new JsonResponse($response);
    }

    public function get()
    {
        return new JsonResponse([]);
    }

}