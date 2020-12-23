<?php

namespace App\Http\Controllers;

use App\Entity\Shop\Cart;
use App\Helpers\JsonHelper;
use Illuminate\Http\Request;
use App\Entity\Shop\Product;
use Illuminate\Support\Facades\Auth;

class PayController extends Controller
{
    const ORDER_PROCESS = 0;

    public function pay(Request $request) {
        $user = Auth::user();
        $cartProducts = Cart::with('product')->where('user_id', $user->id)->get();
        $del = $request->delivery;
        $delivery_method = explode(',', $del);
        if ($delivery_method[0] === 1){
            $delivery_price = 15000;
        }else if($delivery_method[0] === 2){
            $delivery_price = 0;
        }else{
            $delivery_price = 35000;
        }
        if ($user){
            $order = $user->order()->create([
                'user_id' => $user->user_id,
                'total_cost' => $request->total_cost,
                'note' => $request->wishes,
                'status' => PayController::ORDER_PROCESS,
                'delivery_index' => $request->index,
                'cancel_reason' => 0,
                'statuses_json' => ['hola'],
                'phone' => $request->phone,
                'name' => $request->userName,
                'delivery_method_id' => $delivery_method[0],
                'delivery_method_name_uz' => $delivery_method[1],
                'delivery_method_name_ru' => $delivery_method[1],
                'delivery_method_name_en' => $delivery_method[1],
                'delivery_cost' => $delivery_price,
                'payment_type_id' => 1,
                'delivery_address' => $request->country . ' ' . $request->city . ' ' . $request->address . ' '
                    . $request->house . ' ' . $request->flat,
            ]);
            $cartProductId = $cartProducts->pluck('product_id')->toArray();

            foreach ($cartProducts as $i => $cartProduct){
                $orderItem = $order->orderItems()->create([
                    'product_name_uz' => $cartProduct->product->name_uz,
                    'product_name_ru' => $cartProduct->product->name_ru,
                    'product_name_en' => $cartProduct->product->name_en,
                    'price' => $cartProduct->product->price_uzs,
                    'quantity' => $cartProduct->quantity,
                    'discount' => $cartProduct->product->discount,
                    'product_id' => $cartProduct->product_id,
                    'product_code' => $cartProduct->id,//TODO modification add
                ]);
            }
            $user->carts()->delete();

            return view('cart.pay', compact('order'));

        }else{
            return view('admin.auth.login');
        }

    }

    public function finalStep(Request $request){
        return $request;
    }
}
