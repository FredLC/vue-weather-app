<?php

use Zttp\Zttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/weather', function() {
    $apiKey = config('services.api.key');
    $lat = request('lat');
    $lon = request('lon');

    $response = Zttp::get("https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&units=metric&appid=$apiKey");

    return $response->json();
});

Route::get('/weather-forecast', function() {
    $apiKey = config('services.api.key');
    $lat = request('lat');
    $lon = request('lon');

    $response = Zttp::get("https://api.openweathermap.org/data/2.5/forecast/daily?lat=$lat&lon=$lon&cnt=7&units=metric&appid=$apiKey");

    return $response->json();
});
