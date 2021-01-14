<?php

namespace App\Providers;

use App\Entity\Banner;
use App\Entity\Brand;

use App\Entity\Category;
use App\Entity\Page;
use App\Entity\Shop\Cart;
use App\Entity\Shop\Product;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(IdeHelperServiceProvider::class);
        }
        //
    }

    public function boot()
    {
        view()->composer('*', function ($view) {
            $gUserExists = \Auth::user();
            $gCategories = Category::get()->toTree();
            $gBrands = Brand::get();
            $discountProducts = Product::where('discount', '>', 0.5 )->limit(3)->get();
            $pages = Page::get();
            $longBanner = Banner::published()->where('type', Banner::TYPE_LONG)->get()->random();
            if ($gUserExists !== null){
                $gCartCount = Cart::where('user_id', $gUserExists->id)->get();
                $favoriteProductIds = \App\Entity\UserFavorite::where('user_id', Auth::user()->id)->pluck('product_id')->toArray();
            }
            $view->with(compact(['gCategories', 'gBrands', 'discountProducts', 'gCartCount', 'pages', 'longBanner', 'favoriteProductIds']));
        });
    }
}
