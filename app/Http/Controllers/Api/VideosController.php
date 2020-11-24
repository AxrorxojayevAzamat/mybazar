<?php

namespace App\Http\Controllers\Api;


use App\Entity\Blog\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideosController extends Controller
{


    public function index(Request $request)
    {
        if($request->has('category_id')){
            $data = Video::whereIn('category_id',$request->category_id)->paginate(12);
            return response()->json($data);
        }

        $data = Video::paginate(12);
        return response()->json($data);
    }
}
