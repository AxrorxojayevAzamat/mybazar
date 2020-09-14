@extends('layouts.default-layout')

@section('title', 'Single blog page')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/single-blog.css')}}">
@endsection
@section('body')
    @extends ('partials.menu')
@section('page')
  
    @section('banner')
        <!-- Slide banner -->
        @include ('layouts.slide-banner-catalog')
    @endsection

    <!-- single-blog btn -->
    @include('blog._blog-news-btn')

    <!-- Single body blog -->
    @include('blog.blog-show-body')


    <!-- recently viewed -->
    @include('layouts.recently-viewed')

@endsection

@endsection

@section('script')
    <script src="{{asset('js/1-index.js')}}"></script>
    <script src="{{asset('js/3-popular-page.js')}}"></script>
@endsection
