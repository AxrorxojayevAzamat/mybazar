@extends('layouts.app')

@section('title', 'Home page')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.rateyo.css')}}">
@endsection

@section('body')
    <!-- Casousel -->
    @include ('layouts.carousel')

    <!-- PRODUCT OF DAY -->
    @include ('layouts.products-of-day')

    <!-- POPULAR PRODUCTS -->
    @include ('popular.popular-products')

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


@section('script')
    <script src="{{asset('js/1-index.js')}}"></script>
    <script src="{{asset('js/jquery.rateyo.js')}}"></script>
@endsection


