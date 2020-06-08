@extends('layouts.default-layout')

@section('title', 'Sales page')   
    @include ('includes.common-style') 
    @section('styles')
        <link rel="stylesheet" href="{{asset('css/sales.css')}}">
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

                <!-- BREADCRUMB -->
                @include('layouts.breadcrumb-sales')

                <!-- sales body -->
                @include('layouts.sales-body')

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
    @endsection