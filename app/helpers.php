<?php

use App\Entity\Shop\Category;
use App\Http\Router\ProductsPath;

if (! function_exists('products_path')) {

    function products_path(?Category $category)
    {
        return app()->make(ProductsPath::class)
            ->withCategory($category);
    }
}
