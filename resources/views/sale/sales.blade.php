@extends('layouts.default-layout')

@section('title', 'Sales page')   
@include ('includes.common-style')
    @section('styles')
        <link rel="stylesheet" href="{{asset('css/sales.css')}}">
    @endsection
    
    @section('body')
        @extends ('partials.menu')
            @section('page')
                <!-- sales body -->
                @include('sale.sales-body')

                <!-- recently viewed -->
                @include('layouts.recently-viewed')

            @endsection

    @endsection

    @section('script')
    <script src="{{asset('js/1-index.js')}}"></script>
    @endsection