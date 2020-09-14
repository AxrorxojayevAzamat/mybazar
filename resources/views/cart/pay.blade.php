@extends('layouts.default-layout')

@section('title', 'Pay page')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/pay.css')}}">
@endsection

@section('body')
    @extends ('partials.menu')
@section('page')

    <!-- Pay body -->
    @include('cart.pay-body')

@endsection
@endsection


@section('script')
    <script src="{{asset('js/1-index.js')}}"></script>
@endsection


