@extends('layouts.app')

@section('title', trans('frontend.title.single_blog_page'))

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
    <script src="{{asset('js/3-popular-page.js')}}"></script>
@endsection
