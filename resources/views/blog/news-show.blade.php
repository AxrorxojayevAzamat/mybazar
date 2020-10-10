@extends('layouts.app')

@section('title', 'Single news page')

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
    <script src="{{asset('js/shopping-cart.js')}}"></script>
    <script src="{{asset('js/compare-items.js')}}"></script>
    <script src="{{asset('js/1-index.js')}}"></script>
@endsection
