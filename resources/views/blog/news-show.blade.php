@extends('layouts.app')

@section('title', trans('frontend.title.single_news_page'))

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/video-blog.css')}}"> --}}
@endsection

@section('body')
    @section('banner')
        <!-- Slide banner -->
        @include ('layouts.slide-banner-catalog')
    @endsection

    <!-- single-blog btn -->
    @include('blog._blog-news-btn')

    <!-- list of news -->
    @include ('blog.news-show-body')

    <!-- recently viewed -->
    @include('layouts.recently-viewed')
@endsection

@section('script')
    <script src="{{mix('js/shopping-cart.js', 'build')}}"></script>
    <script src="{{mix('js/compare-items.js', 'build')}}"></script>
@endsection
