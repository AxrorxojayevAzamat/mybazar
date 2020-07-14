@extends('layouts.default-layout')

@section('title', 'News page')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/blog-news.css')}}">
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

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-blog" role="tabpanel" aria-labelledby="pills-blog">
            <!-- blog body -->
            @include('layouts.blog-body')
        </div>
        <div class="tab-pane fade show active" id="pills-news" role="tabpanel" aria-labelledby="pills-news">
            <!-- blog body -->
            @include('layouts.news-body')
        </div>
    <div>
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
