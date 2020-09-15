@extends('layouts.default-layout')

@section('title', 'Brands')   
@include ('includes.common-style')
    @section('styles')
        <link rel="stylesheet" href="{{asset('css/brands.css')}}">
    @endsection
    
    @section('body')
        @extends ('partials.menu')
            @section('page')

                <!-- all brands list -->
                @include('brand.brands-body')
            
            @endsection

    @endsection

    @section('script')
    <script src="{{asset('js/1-index.js')}}"></script>
    @endsection