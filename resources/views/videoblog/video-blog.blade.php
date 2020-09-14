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

    <!-- list of videos -->
    @include ('pages.videoblog.video-blog-body', ['categories'=>'category'])

    <!-- recently viewed -->
    @include('layouts.recently-viewed')

    @endsection

    @endsection

    @section('script')
    <script src="{{asset('js/1-index.js')}}"></script>
    @endsection