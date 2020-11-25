<?php

namespace App\Http\Controllers;

use App\Entity\Shop\Cart;
use App\Entity\Shop\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
//        dd(Auth::user());
        if ($request->has('product_id')) {

//            dd($request->product_id);

            $user = Auth::user();
//            dd(Auth::user());
            $cart = $user->carts()->create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity ?? 1,
            ]);

            return $cart;
        }

        return 'there is  no info';
    }

    public function remove(Request $request)
    {
        if ($request->has('product_id')) {
            $user = Auth::user();
            $cart_delete = Cart::where('product_id', $request->product_id)/*->where('user_id', $user)*/->delete();
            return $cart_delete;
        }
        return 'There is no info';
    }

}
