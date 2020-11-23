<?php

namespace App\Http\Controllers\Api\Shop;


use App\Entity\Shop\Cart;
use App\Entity\Shop\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
//        if (!userAuth()){
//        $cartProduct = Cart::where('user_id', '==', 'id');
//        $cartProduct = Cart::all();

        if (session('cart')){
            $cartProduct = Product::whereIn('id', session('cart'));
            return response()->json([
                'cartProduct' => $cartProduct->toArray(),
            ]);
        }else{
            $cartProduct = Cart::all();
//            dd($cartProduct->product_id);
            $product_id = [];
            foreach ($cartProduct as $i => $cartProduct_id){
//                dd($cartProduct_id->product_id);
//                if (count($cartProduct) == 1){
//                    $product_id = $cartProduct_id->product_id;
//                }else{
                    $product_id[$i] = $cartProduct_id->product_id;
//                }
            }
//            if (count($product_id) === 1 ){
//                $products = Product::where('id', $product_id)->get();
//            }else{
                $products = Product::whereIn('id', $product_id)->get();
//            }
//            dd($products);


            return response()->json([
                'products' => $products,
            ]);
        }
        return [];
//    }

    }
}
