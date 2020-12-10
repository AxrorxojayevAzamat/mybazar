<?php

namespace App\Http\Controllers;

use App\Entity\Shop\Cart;
use App\Entity\Shop\Product;
use App\Helpers\ImageHelper;
use App\Http\Resources\Shop\CartResource;
use App\Http\Resources\Shop\CompareResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CompareController extends Controller
{
    public function show(Request $request){
        if ($request->has('data')) {
            $data = explode(',', $request->get('data'));
            array_pop($data);
            return CompareResource::collection(Product::whereIn('id',$data)->get());
        }
        return false;
    }

}
