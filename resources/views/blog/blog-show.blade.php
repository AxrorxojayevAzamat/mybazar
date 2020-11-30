@extends('layouts.app')

@section('title', trans('frontend.title.single_blog_page'))

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/single-blog.css')}}"> --}}
@endsection

@section('body')
    @section('banner')
        <!-- Slide banner -->
        @include ('layouts.slide-banner-catalog')
    @endsection

    <!-- single-blog btn -->
    @include('blog._blog-news-btn')

    <!-- Single body blog -->
    @include('blog.blog-show-body')

    <!-- recently viewed -->
    @include ('layouts.carousel-products',
        ['products' => $recentProducts, "title" => trans('frontend.product.you_watched'), 'rate_for' => ['js' => '"R"', 'html' => 'R']])
@endsection

@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
    <script src="{{asset('js/3-popular-page.js')}}"></script>
@endsection
