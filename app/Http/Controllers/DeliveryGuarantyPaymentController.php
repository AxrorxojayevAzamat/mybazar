<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class DeliveryGuarantyPaymentController extends Controller
{
    public function deliveryGuarantyPayment() {
        return view("pages.delivery-guaranty-payment"); 
    }
}
