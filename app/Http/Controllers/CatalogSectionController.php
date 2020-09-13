<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;
use App\Entity\Shop\Category;
use App\Entity\Shop\ProductCategory;


class CatalogSectionController extends Controller
{
    public function catalogSection() {
        $rootCategories = Category::where(['parent_id' => null])->get();
        //  dd($categories);
         return view('pages.catalog.catalog-section',compact('rootCategories'));
    }
}
