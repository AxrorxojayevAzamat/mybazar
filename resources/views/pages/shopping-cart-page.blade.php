@extends('layouts.default-layout')

@section('title', 'Home page')  
    @include ('includes.common-style') 
    @section('styles')
        <link rel="stylesheet" href="{{asset('css/shopping-cart-page.css')}}">
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
                    @include ('layouts.shopping-cart-body')
                    <!-- FOOTER -->
                    @include ('layouts.footer')
                @endsection

        @endsection

        @section('script')
            <script src="{{asset('js/1-index.js')}}"></script>
            <script src="{{asset('js/shopping-cart.js')}}"></script>
            <script src="{{asset('js/compare-items.js')}}"></script>
        @endsection
