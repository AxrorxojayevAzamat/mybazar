@extends('layouts.default-layout')

@section('title', 'Productviewpage characteristics')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/productviewpage.css')}}">
@endsection

@section('body')
    @extends ('layouts.menu')
@section('page')
    <!-- All headers 1560 -->
    <section class="navbar-1560">
        @include('layouts.top-header')
        @include('layouts.main-header')
        @include('layouts.nav-header')
    </section>

    <!-- product with description -->
    @include('layouts.single-product-with-des')

    <!-- similar products -->
    @include('layouts.similar-products')

    <!-- other products of this seller -->
    @include('layouts.other-products-of-this-seller')

    <!-- single-charachteristics-comments btn -->
    @include('layouts.charac-singlep-com-btn')

    <!-- full characteristics of single products -->
    @include('layouts.full-characteristics-singlep')

    <!-- u will also like -->
    @include('layouts.u-will-also-like')

    <!-- recently viewed -->
    @include('layouts.recently-viewed')

    <!-- NEWS LETTER -->
    @include ('layouts.news-letter')

    <!-- FOOTER -->
    @include ('layouts.footer')
@endsection
@endsection


@section('script')
    <script src="{{asset('js/1-index.js')}}"></script>
    <script src="{{asset('js/2-catalog-page.js')}}"></script>
@endsection


