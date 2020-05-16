<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return ['framework' => 'Laravel', 'version' => '6.8.2'];
});

Route::get('characteristics/{characteristic}', 'Api\Shop\CharacteristicController@show');
