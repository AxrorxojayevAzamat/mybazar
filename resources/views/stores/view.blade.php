@extends('layouts.app')

@section('title', trans('frontend.title.shop_view'))

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/shop.css')}}"> --}}
@endsection

@section('body')
    <div class="h4-title">
        <h4 class="title">{!! $store->name !!}</h4>
    </div>
    @include ('layouts.slide-banner-catalog')

    @include ('layouts.products-of-day')

    <div class="outter-catalog-view">
        <!-- big filter without title checkbox -->
        <form class="big-filter-without-title-checkbox" id="shop-filter-form">
            @include('filters.category-blog-filter')
        </form>

        {{--        @include('shop.big-filter-without-title-checkbox')--}}

        <div class="wrapper-filtered-items">
            <nav class=" navbar navbar-expand-custom sort-types">
                <!--sort-by options  -->
            @include('layouts.sort-by-options')

            <!-- small filter without title checkbox -->
                @include('layouts.small-filter-without-title-checkbox')
            </nav>

            <!-- list mosaic catalog items -->
        @include('layouts.products-list-grid', ['products' => $products])

        <!-- pagination -->
            <nav class="products-pagination" aria-label="Page navigation example">
                {{ $products->links() }}
            </nav>


        </div>
    </div>
@endsection


@include('shop._scripts')
@push('script')
    <script>
        $(function () {
            let min_price = {{$min_price}}, max_price = {{$max_price}}
            var $range = $(".js-range-slider"),
                $inputFrom = $(".js-input-from"),
                $inputTo = $(".js-input-to"),
                instance,
                min = min_price,
                max = max_price,
                from = 0,
                to = 0;

            $range.ionRangeSlider({
                type: "double",
                min: min,
                max: max,
                from: min_price,
                to: max_price,
                prefix: '',
                onStart: updateInputs,
                onChange: updateInputs,
                step: 100,
                prettify_enabled: true,
                prettify_separator: ".",
                values_separator: " - ",
                force_edges: true,


            });

            instance = $range.data("ionRangeSlider");

            function updateInputs (data) {
                from = data.from;
                to = data.to;

                $inputFrom.prop("value", from);
                $inputTo.prop("value", to);
            }

            $inputFrom.on("input", function () {
                var val = $(this).prop("value");

                // validate
                if (val < min) {
                    val = min;
                } else if (val > to) {
                    val = to;
                }

                instance.update({
                    from: val
                });
            });

            $inputTo.on("input", function () {
                var val = $(this).prop("value");

                // validate
                if (val < from) {
                    val = from;
                } else if (val > max) {
                    val = max;
                }

                instance.update({
                    to: val
                });
            });

        });

    </script>
@endpush
