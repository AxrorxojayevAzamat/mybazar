<?php

namespace App\Http\Controllers;

use App\Entity\Shop\Product;

class CartController extends Controller
{
    private $times = [
        7 * 24 * 3600,
        15 * 24 * 3600,
        30 * 24 * 3600,
    ];
    
    public function cart()
    {
        $index = 0;
        $length = count($this->times);
        $interestingProducts = null;
        while ($index < $length) {
            $query = Product::where('created_at', '>=', date('Y-m-d H:i:s', time() - $this->times[$index]));
            if ($query->exists()) {
                $interestingProducts = $query->active()->orderByDesc('rating')->orderByDesc('created_at')->limit(10)->get();
                break;
            }
            $index++;
        }
        return view("cart.cart");
    }

}
