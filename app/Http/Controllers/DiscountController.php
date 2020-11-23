<?php

namespace App\Http\Controllers;

use App\Entity\Discount;
use App\Entity\Shop\Product;

class DiscountController extends Controller {

    public function index() {
        $recentProducts = Product::orderByDesc('created_at')->limit(8)->get();

        $discounts = Discount::commoned()->paginate(18);
        return view('discounts.index', compact('discounts', 'recentProducts'));
    }

    public function show(Discount $discount) {
//        dd($discount->name);
        $recentProducts = Product::orderByDesc('created_at')->limit(8)->get();
        $product = Product::where(['main_category_id' => $discount->category_id])->where('discount', '>', 0)->where('discount_ends_at', '>', date('Y-m-d H:i:s'))
            ->orderByDesc('discount')->paginate(12);


        return view('discounts.show', compact('discount','recentProducts','product'));
    }

}
