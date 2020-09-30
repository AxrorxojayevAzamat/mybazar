@extends('layouts.app')

@section('title', 'Delivery page')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/delivery-guaranty-payment.css')}}">
@endsection

@section('body')
    <!-- blog-news btn -->
    @include('delivery.delivery-g-p-btn')

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-delivery" role="tabpanel" aria-labelledby="pills-delivery">
            <!-- delivery body -->
            @include('delivery.delivery-body')
        </div>

        <div class="tab-pane fade" id="pills-guaranty" role="tabpanel" aria-labelledby="pills-guaranty">
            <!-- guaranty body -->
            @include('delivery.guaranty-body')
        </div>

        <div class="tab-pane fade" id="pills-payment" role="tabpanel" aria-labelledby="pills-payment">
            <!-- payment body -->
            @include('delivery.payment-body')
        </div>
    </div>
@endsection


@section('script')
    <script src="{{asset('js/1-index.js')}}"></script>
@endsection
