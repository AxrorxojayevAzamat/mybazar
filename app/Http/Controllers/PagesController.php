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
    public function popular() {
        return view("pages.popular");
    }
    public function brandView(){
        return view("pages.brand-view");
    }
    public function brands(){
        return view("pages.brands");
    }
    public function sales(){
        return view("pages.sales");
    }
    public function videoblog(){
        return view("pages.video-blog");
    }
    public function shopview(){
        return view("pages.shop-view");
    }
    public function blog(){
        return view("pages.blog");
    }
    public function news(){
        return view("pages.news");
    }
    public function delivery(){
        return view("pages.delivery");
    }
    public function guaranty(){
        return view("pages.guaranty");
    }
    public function payment(){
        return view("pages.payment");
    }
    public function catalogSection(){
        return view("pages.catalog-section");
    }
    

}
