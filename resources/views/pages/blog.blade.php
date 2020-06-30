@extends('layouts.default-layout')

@section('title', 'Blog page')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/blog.css')}}">
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

    <!-- BREADCRUMB -->
    @include('layouts.breadcrumb-blog')

    
    <!-- blog-news btn -->
    @include('layouts.blog-news-btn')

    <!-- blog body -->
    @include('layouts.blog-body')
    
    <!-- recently watched -->
        @include('layouts.recently-viewed')

     <!-- NEWS LETTER -->
     @include ('layouts.news-letter')

<!-- FOOTER -->
@include ('layouts.footer')
@endsection
@endsection


@section('script')
<script src="{{asset('js/1-index.js')}}"></script>
@endsection
