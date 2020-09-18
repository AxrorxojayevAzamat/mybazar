<?php

namespace App\Http\Controllers\Api;

use App\Entity\Blog\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{


    public function index(Request $request)
    {
        if($request->has('category_id')){
            $data = Post::whereIn('category_id',$request->category_id)->paginate(12);
            return response()->json($data);
        }

        $data = Post::paginate(12);
        return response()->json($data);
    }
}
