@extends('layouts.default-layout')

@section('title', 'Payment page')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/payment.css')}}">
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
    @include('layouts.breadcrumb-payment')

    <!-- blog-news btn -->
    @include('layouts.d-g-payment-btn')

    <!-- slide banner -->
    @include('layouts.slide-banner-payment')

    <!-- delivery body -->
    @include('layouts.payment-body')

    <!-- NEWS LETTER -->
    @include ('layouts.news-letter')

<!-- FOOTER -->
@include ('layouts.footer')
@endsection
@endsection


@section('script')
<script src="{{asset('js/1-index.js')}}"></script>
@endsection