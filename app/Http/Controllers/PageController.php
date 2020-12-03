<?php

namespace App\Http\Controllers;

use App\Entity\Page;
use App\Http\Router\PagePath;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(PagePath $path)
    {
        $page = $path->page;
//        $page = Page::limit(3)->get();
//        $titles = Page::getTitleAttribute();
//        dd($titles);
//                dd($page);

        return view('pages.show', compact('page'));
    }
}
