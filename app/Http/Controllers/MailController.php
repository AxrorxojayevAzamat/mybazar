<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class MailController extends Controller
{
    public function mail() {
        
        return view('pages.mail'); 
    }
}
