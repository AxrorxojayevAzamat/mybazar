<?php

namespace App\Http\Controllers;

use App\Helpers\JsonHelper;
use Illuminate\Http\Request;
use App\Entity\Shop\Product;
use Illuminate\Support\Facades\Auth;

class PayController extends Controller
{
    const ORDER_PROCESS = 0;

    public function pay(Request $request) {
        $user = Auth::user();
        if ($user){
            $order = $user->order()->create([
                'user_id' => $user->user_id,
                'total_cost' => $request->total_cost,
                'note' => $request->wishes,
                'status' => PayController::ORDER_PROCESS,
                'delivery_index' => 15,
                'cancel_reason' => 0,
                'statuses_json' => ['hola'],
                'phone' => $request->phone,
                'name' => $request->userName,
                'delivery_method_id' => 1,
                'delivery_method_name_uz' => 'Flesh delivery',
                'delivery_method_name_ru' => 'Flesh delivery',
                'delivery_method_name_en' => 'Flesh delivery',
                'delivery_cost' => 10000,
                'payment_type_id' => 1,
                'delivery_address' => $request->country . ' ' . $request->city . ' ' . $request->address . ' '
                    . $request->house . ' ' . $request->flat,
            ]);
            return $order;
        }else{
            return 0;
        }

        return view('cart.pay');
    }
}
