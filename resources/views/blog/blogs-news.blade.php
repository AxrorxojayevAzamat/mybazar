@extends('layouts.default-layout')

@section('title', 'News page')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/blog-news.css')}}">
@endsection

@section('body')
    @extends ('partials.menu')
@section('page')

    <!-- blog-news btn -->
    @include('blog._blog-news-btn')

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-blog" role="tabpanel" aria-labelledby="pills-blog">
            <!-- blog body -->
            @include('blog.blog-body')
        </div>
        <div class="tab-pane fade show active" id="pills-news" role="tabpanel" aria-labelledby="pills-news">
            <!-- blog body -->
            @include('blog.news-body')
        </div>
    <div>
    <!-- recently watched -->
    @include('layouts.recently-viewed')

@endsection
@endsection


@section('script')
<script src="{{asset('js/1-index.js')}}"></script>
@endsection
