@extends('layouts.default-layout')

@section('title', 'Delivery page')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/delivery-guaranty-payment.css')}}">
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
    @include('layouts.breadcrumb-delivery')

    <!-- blog-news btn -->
    @include('layouts.delivery-g-p-btn')

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-delivery" role="tabpanel" aria-labelledby="pills-delivery">
            <!-- delivery body -->
            @include('layouts.delivery-body')
        </div>

        <div class="tab-pane fade show active" id="pills-guaranty" role="tabpanel" aria-labelledby="pills-guaranty">
            <!-- guaranty body -->
            @include('layouts.guaranty-body')
        </div>

        <div class="tab-pane fade show active" id="pills-payment" role="tabpanel" aria-labelledby="pills-payment">
            <!-- payment body -->
            @include('layouts.payment-body')
        </div>
    </div>

    <!-- NEWS LETTER -->
    @include ('layouts.news-letter')

<!-- FOOTER -->
@include ('layouts.footer')
@endsection
@endsection


@section('script')
<script src="{{asset('js/1-index.js')}}"></script>
@endsection