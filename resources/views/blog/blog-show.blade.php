@extends('layouts.app')

@section('title', 'Single blog page')

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/single-blog.css')}}"> --}}
@endsection

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
    @include('layouts.recently-viewed')
@endsection

@section('script')
<script src="{{mix('js/1-index.js', 'build')}}"></script>
    <script src="{{asset('js/3-popular-page.js')}}"></script>
@endsection
