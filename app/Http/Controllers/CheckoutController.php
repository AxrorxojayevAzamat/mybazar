<?php

namespace App\Http\Controllers;

use App\Entity\Shop\Cart;
use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class CheckoutController extends Controller
{
    public function checkout() {
        $user = \Auth::user();
        if (!$user){
            return view('admin.auth.login');
        }else{

            $cart_product = Cart::where('user_id', $user->id)->get();

            $cart_product_id = [];
            foreach ($cart_product as $i => $product_id) {
                $cart_product_id[$i] = $product_id->product_id;
            }

            $products = Product::whereIn('id', $cart_product_id)->get();

            $cart_product_count = count($products);
            $cart_product_weight = 0;
            $cart_product_discount = 0;
            $cart_product_total = 0;

            foreach ($products as $i => $product) {
//            dd($product);
                $cart_product_weight += $product->weight;
                $cart_product_total += $product->price_uzs;
                $cart_product_discount += $product->discount;
            }

            $cart_product_discount_amount = $cart_product_total * $cart_product_discount;
            $cart_product_total = $cart_product_total - $cart_product_discount_amount;

//            return view('cart.cart', compact('products', 'cart_product_total',
//                'cart_product_count', 'cart_product_weight', 'cart_product_discount', 'cart_product_discount_amount',
//                'cart_product_id'));
            return view('cart.checkout', compact('cart_product_total', 'cart_product_count', 'cart_product_weight', 'cart_product_discount', 'cart_product_discount_amount', 'cart_product_id'));
        }
    }
}
