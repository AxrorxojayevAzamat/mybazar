<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class PopularController extends Controller
{
    public function popular() {
        $query = Product::orderByDesc('created_at');
        $products = $query->paginate(12); // boshqa payt, get() ni ishlatsayam boladi

        $ratings = [];
        foreach($products as $i => $product) {
            $ratings[$i] = [
                'id' => $product->id,
                'rating' => $product->rating,
            ];
        }

        return view('popular.popular', compact('products', 'ratings')); //compact ichidigi peremenniyla , view digi blade ga beriladi.
    }
}
