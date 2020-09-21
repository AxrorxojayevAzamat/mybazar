<?php

namespace App\Http\Controllers;

class SalesController extends Controller {

    public function sales() {
        return view('sale.sales');
    }

    public function show() {
        return view('sale.show');
    }

}
