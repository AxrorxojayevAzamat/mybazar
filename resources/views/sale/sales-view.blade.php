@extends('layouts.default-layout')

@section('title', 'Sales view')   
@include ('includes.common-style')
    @section('styles')
        <link rel="stylesheet" href="{{asset('css/sales.css')}}">
    @endsection
        @section('body')
            @extends ('partials.menu')
                @section('page')
@section('banner')
                    <!-- Slide banner -->
                    @include ('layouts.slide-banner-catalog')
@endsection
                    <!-- sales body -->
                    @include('sale.salesview-body')

                      <!-- recently viewed -->
                      @include('layouts.recently-viewed')

                @endsection

        @endsection

        @section('script')
        <script src="{{asset('js/1-index.js')}}"></script>
        @endsection
