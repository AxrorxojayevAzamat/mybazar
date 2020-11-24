@extends('layouts.app')

@section('title', 'Home page')

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/index.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('css/jquery.rateyo.css')}}">
@endsection

@section('breadcrumbs', '')

@section('body')
    <!-- Casousel -->
    @include ('layouts.carousel')

    <!-- PRODUCT OF DAY -->
    @include ('layouts.products-of-day')

    <!-- POPULAR PRODUCTS -->
    @include ('layouts.carousel-products',
        ['products' => $bestsellerProducts, "title" => trans('frontend.popular'), 'rate_for' => ['js' => '"B"', 'html' => 'B']])   {{--CHANGEABLE--}}
    {{-- @include ('popular.popular-products')   CHANGEABLE --}}

    <!-- NEW PRODUCTS -->
    @include ('layouts.carousel-products',
        ['products' => $newProducts, "title" => trans('frontend.novelty_upper'), 'rate_for' => ['js' => '"N"', 'html' => 'N']])   {{--CHANGEABLE--}}
    {{-- @include ('layouts.new-products')   CHANGEABLE --}}

    <!-- 3 small banners -->
    @include ('layouts.three-small-banners')

    <!-- RECOMMENDED PRODUCTS-->
    @include ('layouts.carousel-products',
        ['products' => $newProducts, "title" => trans('frontend.recommend'), 'rate_for' => ['js' => '"R"', 'html' => 'R']])   {{--CHANGEABLE--}}
    {{-- @include ('layouts.recommended-products')   CHANGEABLE   TODO: fix --}}

    <!--INDEX BLOG-->
    @include ('layouts.index-blog')

    <!-- FULL BANNER 1 -->
    @include ('layouts.full-banner1')   {{-- TODO: fix --}}

    <!-- SHOPS -->
    @include ('layouts.index-shops',['products' => $shops2ThreeItems,'rate_for' => ['js' => '"E"', 'html' => 'E']])   {{-- TODO: fix --}}

    <!-- FULL BANNER 2 -->
    @include ('layouts.full-banner2')   {{-- TODO: fix --}}

    <!-- TOP BRANDS  -->
    @include ('layouts.top-brands')   {{-- TODO: fix --}}

    <!-- VIDEOS -->
    @include ('layouts.index-videos')   {{-- TODO: fix --}}
@endsection


@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
    <script src="{{asset('js/jquery.rateyo.js')}}"></script>
@endsection


