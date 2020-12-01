<?php

namespace App\Http\Controllers;

use App\Entity\Discount;
use App\Entity\Shop\Product;
use App\Entity\Shop\ShopDiscounts;
use App\Entity\Shop\ProductDiscount;

class DiscountController extends Controller
{

    public function index()
    {
        $recentProducts = Product::orderByDesc('created_at')->limit(8)->get();
        $discounts = Discount::commoned()->paginate(18);

        return view('discounts.index', compact('discounts', 'recentProducts'));
    }

    public function show(Discount $discount)
    {
        $recentProducts = Product::orderByDesc('created_at')->limit(8)->get();
        $shopDiscounts = ProductDiscount::where(['discount_id' => $discount->id])->pluck('product_id');
        $product = Product::whereIn('id', $shopDiscounts)->paginate(12);
        return view('discounts.show', compact('discount', 'recentProducts', 'product'));
    }

}
