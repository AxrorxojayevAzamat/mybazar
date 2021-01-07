@extends('layouts.app')

@section('title', trans('frontend.title.home_page'))

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

    <!-- NEW PRODUCTS -->
    @include ('layouts.carousel-products',
        ['products' => $newProducts, "title" => trans('frontend.novelty'), 'rate_for' => ['js' => '"N"', 'html' => 'N']])   {{--CHANGEABLE--}}

    <!-- 3 small banners -->
    @include ('layouts.three-small-discounts')

    <!--INDEX BLOG-->
    @include ('layouts.index-blog')

    <!-- TOP BRANDS  -->
    @include ('layouts.top-brands')   {{-- TODO: fix --}}

    <!-- FULL BANNER 1 -->
    @include ('layouts.full-banner1')   {{-- TODO: fix --}}

    <!-- SHOPS -->
    @include ('layouts.index-shops',['products' => $shops2ThreeItems,'rate_for' => ['js' => '"E"', 'html' => 'E']])   {{-- TODO: fix --}}

    <!-- FULL BANNER 2 -->
    @include ('layouts.full-banner2')   {{-- TODO: fix --}}

    <!-- VIDEOS -->
    @include ('layouts.index-videos')   {{-- TODO: fix --}}
@endsection


@section('script')
    <script src="{{asset('js/jquery.rateyo.js')}}"></script>
@endsection
