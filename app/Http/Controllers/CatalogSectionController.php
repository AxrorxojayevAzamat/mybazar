<?php

namespace App\Http\Controllers;

use App\Entity\Shop\Category;


class CatalogSectionController extends Controller
{
    public function catalogSection() {
        $rootCategories = Category::where(['parent_id' => null])->get();
        //  dd($categories);
         return view('catalog.catalog-section',compact('rootCategories'));
    }
}
