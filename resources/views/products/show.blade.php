@extends('layouts.app')

@section('title', $product->name)

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/productviewpage.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('css/jquery.rateyo.css')}}">
@endsection

@section('body')
    <!-- product with description -->
    @include('products.single-product-with-des')

    <!-- similar products -->
    @include('products.similar-products')

    <!-- single-charachteristics-comments btn-->
    @include('products.singlep-charac-com-btn')

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-about-product" role="tabpanel" aria-labelledby="pills-about-product">
            <!-- about product -->
            @include('products.full-des-of-singlep')
        </div>
        <div class="tab-pane fade" id="pills-characteristics" role="tabpanel" aria-labelledby="pills-characteristics-tab">
            <!-- full characteristics of single products -->
            @include('products.full-characteristics-singlep')
        </div>
        <div class="tab-pane fade" id="pills-comments" role="tabpanel" aria-labelledby="pills-comments-tab">
            <!-- full comments -->
            @include('products.full-comments-singlep')
        </div>
    </div>

    <!-- u will also like -->
    @include ('layouts.carousel-products',
        ['products' => $interestingProducts, "title" => trans('frontend.product.interesting_products'), 'rate_for' => ['js' => '"I"', 'html' => 'I']])
{{--        @include('products.u-will-also-like')--}}

    <!-- other products of this seller -->
    @include ('layouts.carousel-products',
        ['products' => $otherProducts, "title" => trans('frontend.product.similar_products'), 'rate_for' => ['js' => '"O"', 'html' => 'O']])
    {{-- @include('products.other-products-of-this-seller') --}}

    <!-- recently viewed -->
    @include ('layouts.carousel-products',
        ['products' => $recentProducts, "title" => trans('frontend.product.you_watched'), 'rate_for' => ['js' => '"R"', 'html' => 'R']])
    {{--    @include('layouts.recently-viewed')--}}
@endsection

@include('products._scripts')
