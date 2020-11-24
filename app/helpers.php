<?php

use App\Entity\Category;
use App\Entity\Page;
use App\Http\Router\PagePath;
use App\Http\Router\ProductsPath;

if (! function_exists('products_path')) {

    function products_path(?Category $category)
    {
        return app()->make(ProductsPath::class)
            ->withCategory($category);
    }

    if (! function_exists('page_path')) {

        function page_path(Page $page)
        {
            return app()->make(PagePath::class)
                ->withPage($page);
        }
    }
}
