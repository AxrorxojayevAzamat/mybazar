@extends('layouts.app')

@section('title', trans('frontend.title.blogs_page'))

@section('banner')
    <!-- Slide banner -->
    @include ('layouts.slide-banner-catalog')
@endsection

@section('body')
    <!-- blog-news btn -->
    @include('blog._blog-news-btn')

    <!-- blog body -->
    @include('blog.blog-body')

    <!-- recently watched -->
    @include ('layouts.carousel-products',
        ['products' => $recentProducts, "title" => trans('frontend.product.you_watched'), 'rate_for' => ['js' => '"R"', 'html' => 'R']])
@endsection
