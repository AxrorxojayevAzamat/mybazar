@extends('layouts.default-layout')

@section('title', 'Home page')   

    @section('styles')
        <link rel="stylesheet" href="{{asset('css/index.css')}}">
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

                <!-- Casousel -->
                @include ('layouts.carousel')
                
                <!-- PRODUCT OF DAY -->
                @include ('layouts.products-of-day')

                <!-- POPULAR PRODUCTS -->
                @include ('layouts.popular-products')

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

                <!-- FULL BANNER 2 -->
                @include ('layouts.full-banner2')

                <!-- TOP BRANDS  -->
                @include ('layouts.top-brands')

                <!-- VIDEOS -->
                @include ('layouts.index-videos')

                <!-- NEWS LETTER -->
                @include ('layouts.news-letter')

                <!-- FOOTER -->
                @include ('layouts.footer')
            @endsection
    @endsection
    
   
    @section('script')
        <script src="{{asset('js/shopping-cart.js')}}"></script>
        <script src="{{asset('js/compare-items.js')}}"></script>
        <script src="{{asset('js/1-index.js')}}"></script>
    @endsection
    

