<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function weather()
    {
        $response = Http::get('http://api.weatherstack.com/current', [
            'access_key' => config('services.weatherstack.key'),
            'query' => 'Ispica',
        ]);

        return response()->json($response->json());
    }
}