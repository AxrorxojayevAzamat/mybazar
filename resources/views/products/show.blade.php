@extends('layouts.app')

@section('title', $product->name)

@section('styles')
    <link rel="stylesheet" href="{{asset('css/productviewpage.css')}}">
@endsection

@section('body')
    <!-- product with description -->
    @include('layouts.single-product-with-des')

    <!-- similar products -->
    @include('layouts.similar-products')

    <!-- other products of this seller -->
    @include('layouts.other-products-of-this-seller')

    <!-- single-charachteristics-comments btn-->
    @include('layouts.singlep-charac-com-btn')

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-about-product" role="tabpanel" aria-labelledby="pills-about-product">
            <!-- about product -->
            @include('layouts.full-des-of-singlep')
        </div>
        <div class="tab-pane fade" id="pills-characteristics" role="tabpanel" aria-labelledby="pills-characteristics-tab">
            <!-- full characteristics of single products -->
            @include('layouts.full-characteristics-singlep')
        </div>
        <div class="tab-pane fade" id="pills-comments" role="tabpanel" aria-labelledby="pills-comments-tab">
            <!-- full comments -->
            @include('layouts.full-comments-singlep')
        </div>
    </div>

    <!-- u will also like -->
    @include('layouts.u-will-also-like')

    <!-- recently viewed -->
    @include('layouts.recently-viewed')
@endsection


@section('script')
    <script src="{{asset('js/1-index.js')}}"></script>
    <script src="{{asset('js/2-catalog-page.js')}}"></script>
@endsection


