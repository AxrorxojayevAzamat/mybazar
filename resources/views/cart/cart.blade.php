@extends('layouts.default-layout')

@section('title', 'Cart page')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/pay.css')}}">
@endsection

@section('body')
    @extends ('partials.menu')
@section('page')

    <!-- Cart body -->
    @include('cart.cart-body')

@endsection
@endsection


@section('script')
    <script src="{{asset('js/1-index.js')}}"></script>
@endsection


