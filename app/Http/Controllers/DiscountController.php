<?php

namespace App\Http\Controllers;

use App\Entity\Discount;

class DiscountController extends Controller {

    public function index() {

        $discounts = Discount::commoned()->paginate(18);
        return view('discounts.index', compact('discounts'));
    }

    public function show(Discount $discount) {
        return view('discounts.show', compact('discount'));
    }

}
