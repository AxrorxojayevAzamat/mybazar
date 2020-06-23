<?php

namespace App\Http\Controllers\Api;


use App\Models\Banners;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannersController extends Controller
{


    public function index(Request $request)
    {
        if($request->has('slug')){
            $data = Banners::where('slug',$request->slug)->get();
            return response()->json($data);
        }
        return [
            'message'=> 'not found',
            'code' => '404'
        ];
    }
}
