@extends('layouts.app')

@section('title', 'Home page')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
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
    @include ('layouts.recommended-products')   {{-- TODO: fix --}}

    <!--INDEX BLOG-->
    @include ('layouts.index-blog')

    <!-- FULL BANNER 1 -->
    @include ('layouts.full-banner1')   {{-- TODO: fix --}}

    <!-- SHOPS -->
    @include ('layouts.index-shops')   {{-- TODO: fix --}}

    <!-- FULL BANNER 2 -->
    @include ('layouts.full-banner2')   {{-- TODO: fix --}}

    <!-- TOP BRANDS  -->
    @include ('layouts.top-brands')   {{-- TODO: fix --}}

    <!-- VIDEOS -->
    @include ('layouts.index-videos')   {{-- TODO: fix --}}
@endsection


@section('script')
    <script src="{{asset('js/1-index.js')}}"></script>
@endsection


