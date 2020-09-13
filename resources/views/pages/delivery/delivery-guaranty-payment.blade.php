@extends('layouts.default-layout')

@section('title', 'Delivery page')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/delivery-guaranty-payment.css')}}">
@endsection

@section('body')
    @extends ('layouts.menu')
@section('page')

    <!-- blog-news btn -->
    @include('pages.delivery.delivery-g-p-btn')

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-delivery" role="tabpanel" aria-labelledby="pills-delivery">
            <!-- delivery body -->
            @include('pages.delivery.delivery-body')
        </div>

        <div class="tab-pane fade" id="pills-guaranty" role="tabpanel" aria-labelledby="pills-guaranty">
            <!-- guaranty body -->
            @include('pages.delivery.guaranty-body')
        </div>

        <div class="tab-pane fade" id="pills-payment" role="tabpanel" aria-labelledby="pills-payment">
            <!-- payment body -->
            @include('pages.delivery.payment-body')
        </div>
    </div>

@endsection
@endsection


@section('script')
<script src="{{asset('js/1-index.js')}}"></script>
@endsection