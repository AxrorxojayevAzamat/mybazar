<?php

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'can:admin-panel']], function () {
    Route::get('', 'HomeController@index')->name('home');
    Route::resource('users', 'UserController');

    Route::group(['prefix' => 'shop', 'as' => 'shop.', 'namespace' => 'Shop'], function () {
        Route::resource('categories', 'CategoryController');
        Route::resource('products', 'ProductController');
        Route::resource('marks', 'MarkController');
        Route::resource('characteristics', 'CharacteristicController');

        Route::post('marks/{mark}/remove-photo', 'MarkController@removeLogo')->name('remove-photo');

        Route::group(['prefix' => 'products/{product}', 'as' => 'products.'], function () {
            Route::get('main-photo', 'ProductController@mainPhoto')->name('main-photo');
            Route::get('photos', 'ProductController@photos')->name('photos');
            Route::post('add-main-photo', 'ProductController@addMainPhoto')->name('add-main-photo');
            Route::post('remove-main-photo', 'ProductController@removeMainPhoto')->name('remove-main-photo');
            Route::post('remove-photo/{photo}', 'ProductController@removePhoto')->name('remove-photo');
            Route::post('add-photo', 'ProductController@addPhoto')->name('add-photo');
            Route::get('move-photo-up/{photo}', 'ProductController@movePhotoUp')->name('move-photo-up');
            Route::get('remove-photo/{photo}', 'ProductController@removePhoto')->name('delete-photo');
            Route::get('move-photo-down/{photo}', 'ProductController@movePhotoDown')->name('move-photo-down');

            Route::group(['prefix' => 'values', 'as' => 'values.'], function () {
                Route::get('create', 'ValueController@create')->name('add');
                Route::post('', 'ValueController@store')->name('store');
                Route::get('characteristic/{characteristic}', 'ValueController@show')->name('show');
                Route::get('characteristic/{characteristic}/edit', 'ValueController@edit')->name('edit');
                Route::put('characteristic/{characteristic}', 'ValueController@update')->name('update');
                Route::delete('characteristic/{characteristic}', 'ValueController@destroy')->name('destroy');
                Route::post('characteristic/{characteristic}/first', 'ValueController@first')->name('first');
                Route::post('characteristic/{characteristic}/up', 'ValueController@up')->name('up');
                Route::post('characteristic/{characteristic}/down', 'ValueController@down')->name('down');
                Route::post('characteristic/{characteristic}/last', 'ValueController@last')->name('last');
            });

            Route::group(['prefix' => 'modifications', 'as' => 'modifications.'], function () {
                Route::get('create', 'ModificationController@create')->name('create');
                Route::post('', 'ModificationController@store')->name('store');
                Route::get('{modification}', 'ModificationController@show')->name('show');
                Route::get('{modification}/edit', 'ModificationController@edit')->name('edit');
                Route::put('{modification}', 'ModificationController@update')->name('update');
                Route::delete('{modification}', 'ModificationController@destroy')->name('destroy');
                Route::post('{modification}/first', 'ModificationController@first')->name('first');
                Route::post('{modification}/up', 'ModificationController@up')->name('up');
                Route::post('{modification}/down', 'ModificationController@down')->name('down');
                Route::post('{modification}/last', 'ModificationController@last')->name('last');
            });
        });

        Route::group(['prefix' => 'categories/{category}', 'as' => 'categories.'], function () {
            Route::post('first', 'CategoryController@first')->name('first');
            Route::post('up', 'CategoryController@up')->name('up');
            Route::post('down', 'CategoryController@down')->name('down');
            Route::post('last', 'CategoryController@last')->name('last');
        });

    });

    Route::resource('stores', 'Store\StoreController');
    Route::group(['prefix' => 'stores/{store}', 'namespace' => 'Store', 'as' => 'stores.'], function () {
        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('create', 'UserController@create')->name('create');
            Route::post('', 'UserController@add')->name('add');
            Route::get('{user}', 'UserController@show')->name('show');
            Route::get('{user}/edit', 'UserController@edit')->name('edit');
            Route::put('{user}', 'UserController@update')->name('update');
            Route::delete('{user}', 'UserController@destroy')->name('destroy');
        });

        Route::post('remove-logo', 'StoreController@removeLogo')->name('remove-logo');
    });

    Route::resource('brands', 'BrandController');
    Route::post('brands/{brand}/remove-logo', 'BrandController@removeLogo')->name('remove-logo');

    Route::resource('payments', 'PaymentController');
    Route::post('payments/{payment}/remove-logo', 'PaymentController@removeLogo')->name('remove-logo');
});
