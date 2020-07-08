@extends('layouts.default-layout')

@section('title', 'Single blog page')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/single-blog.css')}}">
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
    @include('layouts.breadcrumb-single-blog')

    <!-- single-blog btn -->
    @include('layouts.single-blog-btn')

    <!-- Single body blog -->
    @include('pages.bloginner_body')


    <!-- recently viewed -->
    @include('layouts.recently-viewed')

    <!-- NEWS LETTER -->
    @include ('layouts.news-letter')

    <!-- FOOTER -->
    @include ('layouts.footer')

@endsection

@endsection

@section('script')
    <script src="{{asset('js/1-index.js')}}"></script>
    <script src="{{asset('js/3-popular-page.js')}}"></script>
@endsection
