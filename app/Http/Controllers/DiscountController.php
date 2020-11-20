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
        return view('discounts.show', compact('discount'));
    }

}
