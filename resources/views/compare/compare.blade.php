@extends('layouts.app')

@section('title', trans('frontend.title.compare_page'))

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/compare.css')}}"> --}}
@endsection
@section('body')
    <section>
        <div class="h4-title compare">
            <h4 class="title">@lang('frontend.compare_products')</h4>
        </div>
        <div class="outter-compare-body">
            @foreach($products as $product)
            <div class="compare-items">
                <div class="items-view">
                        @include('compare.products')
                </div>
                <div class="accordion" id="fullCharacteristicsCollapse">
                    <div class="row w-100">
                            @foreach($product->allCharacteristics as $i => $values)

                                @include('compare.characteristics')
                            @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection


@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
    <script>
        function addToFavorite(id) {
            let product_id = {};
            product_id.id = id;
            $.ajax({
                url: '{{ route('user.favorites.add',$product) }}',
                method: 'GET',
                success: function (data) {
                    console.log(data);
                }, error: function (data) {
                    console.log(data);
                }
            })
        }
        function changeData(){
            let elem = localStorage.getItem('compare_product');
            window.location.href ="?data=" + elem;
        }
    </script>
@endsection


@include('pages.rating-js', ['products' =>$ratings, 'type' => '"P"'])

