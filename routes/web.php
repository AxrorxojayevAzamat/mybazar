<?php

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'can:admin-panel']], function () {
    Route::get('', 'HomeController@index')->name('home');
    Route::resource('users', 'UserController');

    Route::group(['prefix' => 'shop', 'as' => 'shop.', 'namespace' => 'Shop'], function () {
        Route::resource('categories', 'CategoryController');
        Route::resource('products', 'ProductController');

        Route::group(['prefix' => 'categories/{category}', 'as' => 'categories.'], function () {
            Route::post('/first', 'CategoryController@first')->name('first');
            Route::post('/up', 'CategoryController@up')->name('up');
            Route::post('/down', 'CategoryController@down')->name('down');
            Route::post('/last', 'CategoryController@last')->name('last');
        });

    });

    Route::resource('brands', 'BrandController');
    Route::resource('stores', 'StoreController');
});
