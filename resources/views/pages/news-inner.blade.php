@extends('layouts.default-layout')

@section('title', 'Video blog')
@include ('includes.common-style')
@section('styles')

    <link rel="stylesheet" href="{{asset('css/video-blog.css')}}">
@endsection

@section('body')
    @extends ('layouts.menu')
@section('page')

    <!-- Slide banner -->
    @include ('layouts.slide-banner-catalog')

    <!-- list of news -->
    @include ('pages.news-inner-child')

    <!-- recently viewed -->
    @include('layouts.recently-viewed')



    @endsection

    @endsection

    @section('script')
    <script src="{{asset('js/shopping-cart.js')}}"></script>
    <script src="{{asset('js/compare-items.js')}}"></script>
    <script src="{{asset('js/1-index.js')}}"></script>
    @endsection
