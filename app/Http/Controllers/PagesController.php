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
    public function cart() {
        return view("pages.cart");
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
    public function blogNews(){
        return view("pages.blog-news");
    }
    public function deliveryGuarantyPayment(){
        return view("pages.delivery-guaranty-payment");
    }
    public function catalogSection(){
        return view("pages.catalog-section");
    }
    public function favorites(){
        return view("pages.favorites");
    }
    public function pay(){
        return view("pages.pay");
    }
    public function checkout(){
        return view("pages.checkout");
    }
    public function auth(){
        return view("pages.auth");
    }
    public function sms(){
        return view("pages.sms");
    }
    public function mail(){
        return view("pages.mail");
    }
    public function shops(){
        return view("pages.shops");
    }
    public function singleblog(){
        return view("pages.singleblog");
    }
    public function productViewPage(){
        return view("pages.productviewpage");
    }
    public function compare(){
        return view("pages.compare");
    }
    public function salesView(){
        return view("pages.salesview");
    }
    public function videoBlogView(){
        return view("pages.videoblog-view");
    }
}
