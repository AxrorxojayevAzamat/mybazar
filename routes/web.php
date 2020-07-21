<?php

use App\Entity\Shop\Category;
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

Route::get('/', 'HomeController@index');
Route::get('/catalog', 'PagesController@catalog');
Route::get('/cart', 'PagesController@cart');
Route::get('/checkout', 'PagesController@checkout');

Route::get('/popular', 'PopularController@popular');
Route::get('/brandview', 'PagesController@brandView');
Route::get('/brands', 'PagesController@brands');
Route::get('/sales', 'PagesController@sales');
Route::get('/videoblog', 'PagesController@videoblog');
Route::get('/shopview', 'PagesController@shopview');
Route::get('/blog-news', 'PagesController@blogNews'); //blog and news  are combined
Route::get('/delivery-guaranty-payment', 'PagesController@deliveryGuarantyPayment'); // delivery, guaranty, payment are combined
Route::get('/catalogsection', 'PagesController@catalogSection');
Route::get('/favorites', 'PagesController@favorites');
Route::get('/pay', 'PagesController@pay');
Route::get('/auth', 'PagesController@auth');
Route::get('/sms', 'PagesController@sms');
Route::get('/mail', 'PagesController@mail');
Route::get('/shops', 'PagesController@shops');
Route::get('/singleblog', 'PagesController@singleblog');
Route::get('/productviewpage', 'PagesController@productViewPage'); // comments and characteristics are combined here
Route::get('/compare', 'PagesController@compare');
Route::get('/salesview', 'PagesController@salesView');
Route::get('/videoblog-view', 'PagesController@videoBlogView');







Route::resource('/blogs', 'BlogController');
Route::resource('/videos', 'VideosController');
Route::resource('/news', 'NewsController');
Route::resource('/category', 'CategoryController');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'can:admin-panel']], function () {

    Route::resource('/news', 'NewsController');
    Route::resource('/news-categories', 'NewsCategoryController', ['except' => ['show']]);

    Route::resource('/videos', 'VideosController');
    Route::resource('/videos-categories', 'VideosCategoryController', ['except' => ['show']]);

    Route::resource('/posts', 'PostController');
    Route::resource('/categories', 'CategoryController', ['except' => ['show']]);

    Route::resource('/banners', 'BannersController');
    Route::resource('/sliders', 'SlidersController');






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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
