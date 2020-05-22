<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/catalog', 'PagesController@index');
Route::get('/', 'PagesController@catalog');
// Route::get('/about', 'PagesController@about');
// Route::get('/', 'PagesController@catalog');
Route::get('/cart', 'PagesController@shoppingCart');

