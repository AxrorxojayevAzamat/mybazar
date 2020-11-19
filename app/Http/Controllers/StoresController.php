<?php

namespace App\Http\Controllers;

use App\Entity\Category;
use App\Entity\Store;

class StoresController extends Controller
{
    public function index(){
        $query = Store::where(['status' => Store::STATUS_ACTIVE]);
        $stores = $query->paginate(12);
        $categories = Category::all();
        return view('stores.index',compact('stores','categories'));
    }
}
