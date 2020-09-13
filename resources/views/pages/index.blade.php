@extends('layouts.default-layout')

@section('title', 'Home page')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('body')
    @extends ('partials.menu')
@section('page')

    <!-- Casousel -->
    @include ('layouts.carousel')

    <!-- PRODUCT OF DAY -->
    @include ('layouts.products-of-day')

    <!-- POPULAR PRODUCTS -->
    @include ('pages.popular.popular-products')

    <!-- NEW PRODUCTS -->
    @include ('layouts.new-products')

    <!-- 3 small banners -->
    @include ('layouts.three-small-banners')

    <!-- RECOMMENDED PRODUCTS-->
    @include ('layouts.recommended-products')

    <!--INDEX BLOG-->
    @include ('layouts.index-blog')

    <!-- FULL BANNER 1 -->
    @include ('layouts.full-banner1')

    <!-- SHOPS -->
    @include ('layouts.index-shops')

    <!-- FULL BANNER 2 -->
    @include ('layouts.full-banner2')

    <!-- TOP BRANDS  -->
    @include ('layouts.top-brands')

    <!-- VIDEOS -->
    @include ('layouts.index-videos')
@endsection
@endsection


@section('script')
    <script src="{{asset('js/1-index.js')}}"></script>
@endsection


