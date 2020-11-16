@extends('layouts.app')

@section('title', 'News page')

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/blog-news.css')}}"> --}}
@endsection

@section('body')
    <!-- blog-news btn -->
    @include('blog._blog-news-btn')

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-blog" role="tabpanel" aria-labelledby="pills-blog">
            <!-- blog body -->
            @include('blog.blog-body')
        </div>
        <div class="tab-pane fade show active" id="pills-news" role="tabpanel" aria-labelledby="pills-news">
            <!-- blog body -->
{{--            @include('blog.news-body')--}}
        </div>
    <div>
    <!-- recently watched -->
    @include('layouts.recently-viewed')
@endsection


@section('script')
    <script src="{{asset('js/1-index.js')}}"></script>
@endsection
