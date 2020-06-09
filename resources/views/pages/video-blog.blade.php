@extends('layouts.default-layout')

@section('title', 'Home page')

@section('styles')
    
    <link rel="stylesheet" href="{{asset('css/video-blog.css')}}">
@endsection

@section('body')
    @extends ('layouts.menu')
@section('page')
    <!-- All headers 1560 -->
    <section class="navbar-1560">
        @include('layouts.top-header')
        @include('layouts.main-header')
        @include('layouts.nav-header')
    </section>
    <!-- Slide banner -->
    @include ('layouts.slide-banner-catalog')

    <!-- Breadcrumbs -->
    @include ('layouts.breadcrumb-video-blog')

    <!-- list of videos -->
    @include ('layouts.video-blog-body')

    <!-- recently viewed -->
    @include('layouts.recently-viewed')

     <!-- NEWS LETTER -->
     @include ('layouts.news-letter')

    <!-- FOOTER -->
    @include ('layouts.footer')

    @endsection

    @endsection

    @section('script')
    <script src="{{asset('js/shopping-cart.js')}}"></script>
    <script src="{{asset('js/compare-items.js')}}"></script>
    <script src="{{asset('js/1-index.js')}}"></script>
    @endsection