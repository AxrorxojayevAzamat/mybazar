<?php

namespace App\Http\Controllers;

use App\Entity\Shop\Product;

class CatalogController extends Controller
{
    public function catalog()
    {
        $query = Product::orderByDesc('created_at');
        $products = $query->paginate(12);
        return view('catalog.catalog', compact('products'));
    }

}
