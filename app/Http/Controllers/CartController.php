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
        $user = Auth::user();
//        dd($user);
        if ($request->has('product_id') and $user !== null) {

            if (gettype($request->product_id) !== 'array'){
                $cart = $user->carts()->create([
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity ?? 1,
                ]);
            }else{
                foreach ($request->product_id as $i => $product_id){
                    $cart = $user->carts()->create([
                        'product_id' => $request->product_id[$i],
                        'quantity' => $request->quantity ?? 1,
                    ]);
                }
            }



            return ['message' => 'success'];;
        }

        return ['message' => 'error'];
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
