<?php

namespace App\Providers;

use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Shop\Product;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
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
            $gCategories = Category::get()->toTree();
            $gBrands = Brand::get();
            $discountProducts = Product::where('discount', '>', 0.5 )->limit(3)->get();
            $view->with(compact(['gCategories', 'gBrands', 'discountProducts']));
        });
    }
}
