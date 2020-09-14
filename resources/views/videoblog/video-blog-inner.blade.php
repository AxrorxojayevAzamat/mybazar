@extends('layouts.default-layout')

@section('title', 'Video blog')
@include ('includes.common-style')
@section('styles')

    <link rel="stylesheet" href="{{asset('css/video-blog.css')}}">
@endsection

@section('body')
    @extends ('partials.menu')
@section('page')
    @section('banner')
    <!-- Slide banner -->
    @include ('layouts.slide-banner-catalog')
    @endsection

    <!-- list of videos -->
    @include ('videoblog.video-blog-inner-child')

    <!-- recently viewed -->
    @include('layouts.recently-viewed')

    @endsection

    @endsection

    @section('script')
    <script src="{{asset('js/shopping-cart.js')}}"></script>
    <script src="{{asset('js/compare-items.js')}}"></script>
    <script src="{{asset('js/1-index.js')}}"></script>
    @endsection
