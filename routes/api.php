<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return ['framework' => 'Laravel', 'version' => '6.8.2'];
});

Route::get('characteristics/{characteristic}', 'Api\Shop\CharacteristicController@show');
Route::get('/news', 'Api\NewsController@index');
Route::get('/posts', 'Api\PostsController@index');
Route::get('/videos', 'Api\VideosController@index');
Route::get('/banners', 'Api\BannersController@index');

Route::get('search', 'Api\SearchController@search');

Route::get('cart', 'Api\Shop\CartController@index');
