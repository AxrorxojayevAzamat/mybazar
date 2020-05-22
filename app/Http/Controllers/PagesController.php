<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index() {
        return view('pages.index');
    }
    public function catalog() {
        return view("pages.catalog");
    }
    public function shoppingCart() {
        return view("pages.shopping-cart-page");
    }
    public function about() {
        return view("pages.about");
    }
}
