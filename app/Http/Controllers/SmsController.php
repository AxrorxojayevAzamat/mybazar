<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class SmsController extends Controller
{
    public function sms() {
        return view('pages.sms'); 
    }
}
