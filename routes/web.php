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

Auth::routes();

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::get('logout', 'Auth\LoginController@logout');

    Route::get('home', 'HomeController@index')->name('home');
    Route::get('', 'HomeController@index')->name('front-home');

    Route::get('auth', 'AuthController@auth')->name('auth');
    Route::get('mail', 'MailController@mail')->name('mail');
    Route::get('sms', 'SmsController@sms')->name('sms');

    Route::get('blogs-news', 'BlogController@blogsNews')->name('blogs-news');
    Route::get('blogs/{blog}', 'BlogController@show')->name('blogs.show');
    Route::get('news/{news}', 'NewsController@show')->name('news.show');
    Route::get('brands', 'BrandsController@brands')->name('brands');
    Route::get('brands/{brand}', 'BrandsController@show')->name('brands.show');

    Route::get('cart', 'CartController@cart')->name('cart');
    Route::get('checkout', 'CheckoutController@checkout')->name('checkout');
    Route::get('pay', 'PayController@pay')->name('pay');
    Route::get('catalog', 'CatalogController@catalog')->name('catalog');
    Route::get('catalogsection', 'CatalogSectionController@catalogSection')->name('catalogsection');
    Route::get('compare', 'CompareController@compare')->name('compare');

    Route::get('/delivery-guaranty-payment', 'DeliveryGuarantyPaymentController@deliveryGuarantyPayment')->name('delivery'); // delivery, guaranty, payment are combined

    Route::get('favorites', 'FavoritesController@favorites')->name('favorites');


    Route::get('popular', 'PopularController@popular')->name('popular');
    Route::get('productviewpage', 'ProductViewPageController@productViewPage')->name('productviewpage'); // comments and characteristics are combined here
    Route::get('add-to-cart/{id}', 'ProductController@addToCart');
    Route::patch('update-cart', 'ProductController@update');
    Route::delete('remove-from-cart', 'ProductController@remove');

    Route::get('sales', 'SalesController@sales')->name('sales');
    Route::get('salesview', 'SalesViewController@salesView')->name('salesview');
    Route::get('shops', 'ShopsController@shops')->name('shops');
    Route::get('shopsview', 'ShopsViewController@shopsView')->name('shopsview');

    Route::resource('/category', 'CategoryController');
    Route::resource('/videos', 'VideosController');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'can:admin-panel']], function () {

    Route::group(['prefix' => 'blog', 'as' => 'blog.', 'namespace' => 'Blog'], function () {
        Route::resource('news', 'NewsController');
        Route::group(['prefix' => 'news/{news}', 'as' => 'news.'], function () {
            Route::post('remove-file', 'NewsController@removeFile')->name('remove-file');
            Route::post('publish', 'NewsController@publish')->name('publish');
            Route::post('discard', 'NewsController@discard')->name('discard');
        });

        Route::resource('videos', 'VideoController');
        Route::group(['prefix' => 'videos/{video}', 'as' => 'videos.'], function () {
            Route::post('remove-poster', 'VideoController@removePoster')->name('remove-poster');
            Route::post('remove-video', 'VideoController@removeVideo')->name('remove-video');
            Route::post('publish', 'VideoController@publish')->name('publish');
            Route::post('discard', 'VideoController@discard')->name('discard');
        });

        Route::resource('posts', 'PostController');
        Route::group(['prefix' => 'posts/{post}', 'as' => 'posts.'], function () {
            Route::post('remove-file', 'PostController@removeFile')->name('remove-file');
            Route::post('publish', 'PostController@publish')->name('publish');
            Route::post('discard', 'PostController@discard')->name('discard');
        });

        Route::resource('categories', 'CategoryController');
    });

    Route::resource('banners', 'BannersController');
    Route::resource('sliders', 'SlidersController');

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
            Route::post('main-photo', 'ProductController@addMainPhoto');
            Route::post('remove-main-photo', 'ProductController@removeMainPhoto')->name('remove-main-photo');
            Route::get('photos', 'ProductController@photos')->name('photos');
            Route::post('photos', 'ProductController@addPhoto');
            Route::delete('photos/{photo}', 'ProductController@removePhoto')->name('remove-photo');
            Route::get('move-photo-up/{photo}', 'ProductController@movePhotoUp')->name('move-photo-up');
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

            Route::group(['prefix' => 'reviews', 'as' => 'reviews.'], function () {
                Route::get('', 'ProductReviewController@index')->name('index');
                Route::get('{review}', 'ProductReviewController@show')->name('show');
                Route::delete('{review}', 'ProductReviewController@destroy')->name('destroy');
            });
        });

        Route::group(['prefix' => 'categories/{category}', 'as' => 'categories.'], function () {
            Route::post('first', 'CategoryController@first')->name('first');
            Route::post('up', 'CategoryController@up')->name('up');
            Route::post('down', 'CategoryController@down')->name('down');
            Route::post('last', 'CategoryController@last')->name('last');
        });

        Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
            Route::get('', 'OrderController@index')->name('index');
            Route::get('{order}', 'OrderController@show')->name('show');
            Route::get('{order}/items/{item}', 'OrderController@showItem')->name('item');
            Route::delete('{order}', 'OrderController@destroy')->name('destroy');
        });

        Route::group(['prefix' => 'carts', 'as' => 'carts.'], function () {
            Route::get('', 'CartController@index')->name('index');
            Route::get('{cart}', 'CartController@show')->name('show');
            Route::delete('{cart}', 'CartController@destroy')->name('destroy');
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
            Route::delete('user/{user}', 'UserController@destroy')->name('destroy');
        });

        Route::group(['prefix' => 'deliveries/{delivery_method}', 'as' => 'deliveries.'], function () {
            Route::post('first', 'StoreController@moveDeliveryToFirst')->name('first');
            Route::post('up', 'StoreController@moveDeliveryUp')->name('up');
            Route::post('down', 'StoreController@moveDeliveryDown')->name('down');
            Route::post('last', 'StoreController@moveDeliveryToLast')->name('last');
        });

        Route::post('remove-logo', 'StoreController@removeLogo')->name('remove-logo');
    });

    Route::resource('brands', 'BrandController');
    Route::post('brands/{brand}/remove-logo', 'BrandController@removeLogo')->name('remove-logo');

    Route::resource('payments', 'PaymentController');
    Route::post('payments/{payment}/remove-logo', 'PaymentController@removeLogo')->name('remove-logo');

    Route::resource('deliveries', 'DeliveryController');
});
