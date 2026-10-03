<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EventApiController extends Controller
{
    public function events(Request $request)
    {
        $response = Http::get(
            'https://app.ticketmaster.com/discovery/v2/events.json',
            [
                'apikey' => config('services.ticketmaster.key'),
                'locale' => 'it-it',
                'countryCode' => 'IT',
                'city' => $request->query('city'),
                'size' => 3,
                'keyword' => $request->query('keyword'),
            ]
        );

        return response()->json($response->json());
    }
}