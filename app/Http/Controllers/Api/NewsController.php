<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{


    public function index(Request $request)
    {
        if($request->has('category_id')){
            $data = News::whereIn('category_id',$request->category_id)->paginate(12);
            return response()->json($data);
        }

        $data = News::paginate(12);
        return response()->json($data);
    }
}
