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

//Auth::routes(); - custom (POST)
Route::post('login', 'Auth\LoginController@login'); // TODO duplicate
Route::post('logout', 'Auth\LoginController@logout')->name('logout');// TODO duplicate
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');// TODO duplicate
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');// TODO duplicate
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');// TODO duplicate

Route::get('get-compare', 'CompareController@show')->name('getCompare');
Route::get('compare', 'CompareController@compare')->name('compare');
Route::get('check-compare/{id}/{compare}', 'CompareController@check')->name('compare.check');

Route::post('add-cart', 'CartController@add');
Route::post('remove-cart', 'CartController@remove');
Route::get('admin',function (){
    return redirect('ru/admin');
});

Route::group(['as' => 'user.', 'namespace' => 'User'], function () {
    Route::post('/phone', 'ProfileController@request')->name('phone.request');
    Route::put('/phone-verify', 'ProfileController@verify')->name('phone.verify');
    Route::post('add-to-favorite', 'FavoriteController@addToFavorite')->name('add-to-favorite');
    Route::delete('remove-from-favorite', 'FavoriteController@removeFromFavorite')->name('remove-from-favorite');
});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    //Auth::routes(); - custom(GET)
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::get('logout', 'Auth\LoginController@logout');

    Route::get('/login/{network}', 'Auth\NetworkController@redirect')->name('login.network');
    Route::get('/login/{network}/callback', 'Auth\NetworkController@callback');

    Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
    Route::get('password/reset/request', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::get('password/reset/email', 'Auth\ForgotPasswordController@resetEmail')->name('password.reset.email');
    Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset/request', 'Auth\ForgotPasswordController@resetRequest')->name('password.reset.request');

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    Route::get('verify/email', 'Auth\RegisterController@email')->name('email.verification');
    Route::get('verify/email/{token}', 'Auth\RegisterController@verifyEmail')->name('verify.email');
    Route::get('verify/email/resend', 'Auth\RegisterController@resendEmailShow')->name('resend.email.show');
    Route::post('verify/email/resend', 'Auth\RegisterController@resendEmail')->name('resend.email.verification');
    Route::get('verify/phone', 'Auth\RegisterController@phone')->name('phone.verification');
    Route::post('verify/phone', 'Auth\RegisterController@verifyPhone')->name('verify.phone');
    Route::get('verify/phone/resend', 'Auth\RegisterController@resendPhoneShow')->name('resend.phone.show');
    Route::post('verify/phone/resend', 'Auth\RegisterController@resendPhone')->name('resend.phone.verification');

    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'User'], function () {
        Route::get('add-email', 'ProfileController@addEmailShow')->name('add-email-show');
        Route::get('add-phone', 'ProfileController@addPhoneShow')->name('add-phone-show');
        Route::post('add-email', 'ProfileController@addEmail')->name('add-email');
        Route::post('add-phone', 'ProfileController@addPhone')->name('add-phone');
        Route::get('verify/email', 'ProfileController@email')->name('email.verification');
        Route::get('verify/phone', 'ProfileController@phone')->name('phone.verification');
        Route::get('verify/email/{token}', 'ProfileController@verifyEmail')->name('verify.email');
        Route::post('verify/phone', 'ProfileController@verifyPhone')->name('verify.phone');

        Route::post('request-manager-role', 'ProfileController@requestManagerRole')->name('manager.request');

        Route::post('change-password', 'ProfileController@changePassword')->name('change-password');
    });

    Route::get('home', 'HomeController@index')->name('home');
    Route::get('', 'HomeController@index')->name('front-home');

    Route::get('search', 'SearchResultsController@searchResults')->name('search');
    Route::get('search-product-filter', 'SearchResultsController@SearchFilter')->name('search-product-filter');

    Route::get('auth', 'AuthController@auth')->name('auth');
    Route::get('mail', 'MailController@mail')->name('mail');
    Route::get('sms', 'SmsController@sms')->name('sms');

    Route::get('blogs', 'BlogController@blogs')->name('blogs');
    Route::get('blogs/{blog}', 'BlogController@show')->name('blogs.show');
    Route::get('brands', 'BrandsController@brands')->name('brands');
    Route::get('brands/{brand}', 'BrandsController@show')->name('brands.show');

    Route::get('cart', 'CartController@cart')->name('cart');
    Route::get('checkout', 'CheckoutController@checkout')->name('checkout');
    Route::get('pay', 'PayController@pay')->name('pay');
    Route::group(['prefix' => 'catalog', 'as' => 'catalog.'], function () {
        Route::get('', 'CatalogController@catalog')->name('list');
    });
    Route::get('catalogsection', 'CategoryController@index')->name('catalogsection');

    Route::get('/delivery', 'DeliveryGuarantyPaymentController@deliveryGuarantyPayment')->name('delivery'); // delivery, guaranty, payment are combined
    Route::get('popular', 'PopularController@popular')->name('popular');

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('show/{product}', 'ProductController@show')->name('show');
        Route::post('{product}/add-review', 'ProductController@addReview')->name('add-review');
        Route::group(['prefix' => '{product}/cart', 'as' => 'cart.'], function () {
            Route::get('add', 'ProductController@addToCart')->name('add');
            Route::patch('update-cart', 'ProductController@update')->name('update');
            Route::delete('remove-from-cart', 'ProductController@remove')->name('remove');
        });
        Route::get('{product}/compare-with/{comparingProduct}', 'ProductController@compare')->name('compare');
        Route::get('new-products', 'ProductController@newProducts')->name('new-products');
    });

    Route::get('add-to-cart/{id}', 'ProductController@addToCart')->name('addCard');
    Route::patch('update-cart', 'ProductController@update');
    Route::delete('remove-from-cart', 'ProductController@remove');

    Route::group(['prefix' => 'discounts', 'as' => 'discounts.'], function () {
        Route::get('', 'DiscountController@index')->name('index');
        Route::get('/{discount}', 'DiscountController@show')->name('show');
    });

    Route::group(['prefix' => 'shops', 'as' => 'shops.'], function () {
        Route::get('', 'ShopsController@index')->name('index');
        Route::get('{store}', 'ShopsController@view')->name('show');
    });


    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('', 'CategoryController@index')->name('index');
        Route::get('/{products_path?}', 'CategoryController@show')->name('show')->where('products_path', '.+');
//        Route::get('{category}', 'CategoryController@show')->name('show');
    });

    Route::resource('/videos', 'VideosController');

    Route::group(['as' => 'user.','namespace' => 'User'], function () {
            Route::get('setting','ProfileController@index')->name('setting');
            Route::get('profile','ProfileController@show')->name('profile');
            Route::put('setting','ProfileController@update')->name('update');
            Route::get('favorites','FavoriteController@favorites')->name('favorites')->middleware('auth');
            Route::get('add-to-favorite/{product}','FavoriteController@addToFavorite')->name('favorites.add');
    });

    Route::group(['prefix' => 'pages', 'as' => 'pages.'], function () {
        Route::get('/{page_path}', 'PageController@show')->name('show')->where('page_path', '.+');
    });

    Route::group(['prefix' => 'stores', 'as' => 'stores.'], function () {
        Route::get('', 'StoresController@index')->name('index');
        Route::get('{store}', 'StoresController@store')->name('show');
        Route::get('view/{store}', 'StoresController@view')->name('view');
        Route::get('stores', 'StoresController@view')->name('store');
    });

    Route::get('cart-list', 'CartController@index')->name('cart');
    Route::get('cart-header', 'CartController@showHeader');

});

//--------------- Dashboard ------------------//
Route::group(['prefix' => 'ru','name' => '','middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'can:admin-panel']], function () {
        Route::group(['prefix' => 'blog', 'as' => 'blog.', 'namespace' => 'Blog'], function () {
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
        });

        Route::resource('banners', 'BannerController');
        Route::group(['prefix' => 'banners/{banner}', 'as' => 'banners.'], function () {
            Route::post('remove-file', 'BannerController@removeFile')->name('remove-file');
            Route::post('publish', 'BannerController@publish')->name('publish');
            Route::post('discard', 'BannerController@discard')->name('discard');
        });

        Route::resource('sliders', 'SlidersController');
        Route::group(['prefix' => 'sliders/{slider}', 'as' => 'sliders.'], function () {
            Route::post('first', 'SlidersController@first')->name('first');
            Route::post('up', 'SlidersController@up')->name('up');
            Route::post('down', 'SlidersController@down')->name('down');
            Route::post('last', 'SlidersController@last')->name('last');
        });

        Route::resource('discounts', 'DiscountController');
        Route::group(['prefix' => 'discounts/{discount}', 'as' => 'discounts.'], function () {
            Route::post('remove-file', 'DiscountController@removeFile')->name('remove-file');
            Route::post('common', 'DiscountController@common')->name('common');
            Route::post('rared', 'DiscountController@rared')->name('rared');
        });

        Route::get('', 'HomeController@index')->name('home');

        Route::get('users/manager-role-requests', 'UserController@requestsIndex')->name('users.requests');
        Route::resource('users', 'UserController');
        Route::group(['prefix' => 'users/{user}', 'as' => 'users.'], function () {
            Route::post('remove-avatar', 'UserController@removeAvatar')->name('remove-avatar');
            Route::post('approve-manager-request', 'UserController@approveManagerRoleRequest')->name('request.manager-role.approve');
        });

        Route::resource('categories', 'CategoryController');

        Route::group(['prefix' => 'categories/{category}', 'as' => 'categories.'], function () {
            Route::post('first', 'CategoryController@first')->name('first');
            Route::post('up', 'CategoryController@up')->name('up');
            Route::post('down', 'CategoryController@down')->name('down');
            Route::post('last', 'CategoryController@last')->name('last');
            Route::post('remove-photo', 'CategoryController@removePhoto')->name('remove-photo');
            Route::post('remove-icon', 'CategoryController@removeIcon')->name('remove-icon');
        });

        Route::group(['prefix' => 'shop', 'as' => 'shop.', 'namespace' => 'Shop'], function () {
            Route::resource('products', 'ProductController')->except('create');

            Route::resource('marks', 'MarkController');

            Route::resource('characteristic-groups', 'CharacteristicGroupController');
            Route::group(['prefix' => 'characteristic-groups/{group}', 'as' => 'characteristics.groups.'], function () {
                Route::post('first', 'CharacteristicGroupController@first')->name('first');
                Route::post('up', 'CharacteristicGroupController@up')->name('up');
                Route::post('down', 'CharacteristicGroupController@down')->name('down');
                Route::post('last', 'CharacteristicGroupController@last')->name('last');
            });

            Route::resource('characteristics', 'CharacteristicController');
            Route::group(['prefix' => 'characteristics/{characteristic}', 'as' => 'characteristics.'], function () {
                Route::post('moderate', 'CharacteristicController@moderate')->name('moderate');
                Route::post('draft', 'CharacteristicController@draft')->name('draft');
            });

            Route::post('marks/{mark}/remove-photo', 'MarkController@removeLogo')->name('remove-photo');

            Route::group(['prefix' => 'products/{product}', 'as' => 'products.'], function () {
                Route::post('send-to-moderation', 'ProductController@sendToModeration')->name('on-moderation');
                Route::post('moderate', 'ProductController@moderate')->name('moderate');
                Route::post('activate', 'ProductController@activate')->name('activate');
                Route::post('draft', 'ProductController@draft')->name('draft');
                Route::post('close', 'ProductController@close')->name('close');
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
        Route::get('stores/{store}/products/create', 'Shop\ProductController@create')->name('stores.products.create');
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

            Route::post('moderate', 'StoreController@moderate')->name('moderate');
            Route::post('draft', 'StoreController@draft')->name('draft');
        });

        Route::resource('pages', 'PageController');
        Route::group(['prefix' => 'pages/{page}', 'as' => 'pages.'], function () {
            Route::post('/first', 'PageController@first')->name('first');
            Route::post('/up', 'PageController@up')->name('up');
            Route::post('/down', 'PageController@down')->name('down');
            Route::post('/last', 'PageController@last')->name('last');
        });

        Route::resource('brands', 'BrandController');
        Route::post('brands/{brand}/remove-logo', 'BrandController@removeLogo')->name('remove-logo');

        Route::resource('payments', 'PaymentController');
        Route::post('payments/{payment}/remove-logo', 'PaymentController@removeLogo')->name('remove-logo');

        Route::resource('deliveries', 'DeliveryController');
    });
});
