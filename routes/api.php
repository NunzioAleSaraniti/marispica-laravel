<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\ChatController;

Route::post('/chat', [ChatController::class, 'chat']);

use App\Http\Controllers\WeatherController;

Route::get('/weather', [WeatherController::class, 'weather']);

use App\Http\Controllers\EventApiController;

Route::get('/events', [EventApiController::class, 'events']);