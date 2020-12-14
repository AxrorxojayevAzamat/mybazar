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
        function deleteFromCompare(id) {
            let product_id_local = localStorage.getItem('compare_product');
            product_id_local = product_id_local.replace(id + ',', '');
            let counter = product_id_local.split(',');
            for (let i = 0; i <= counter.length; i++) {
                if (counter[i] == '') {
                    counter.splice(i, 1);
                } else {
                    continue;
                }
            }
            counter = counter.length;
            localStorage.removeItem('compare_product');
            localStorage.setItem('compare_product',product_id_local);
            let elem = localStorage.getItem('compare_product');
            window.location.href ="?data=" + elem;
        }
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
        function addCart(id) {
            let product_id = {};
            product_id.data = [];
            product_id.product_id = id;

            $.ajax({
                url: '/add-cart',
                method: 'POST',
                data: product_id,
                dataType: 'json',
                success: function (data) {

                    if (data.message == 'success') {
                        localStorage.removeItem('product_id');
                        let containerCounter = $('.counter');
                        console.log(counterCartNumber)
                        counterCartNumber += 1;
                        containerCounter.text(counterCartNumber);
                        console.log('exists');
                    } else {
                        nonRegisteredUsersCart(id);
                        console.log($.ajaxSettings.headers);
                        console.log('isnotexists');
                    }
                }, error: function (data) {

                }
            })

        }

        function nonRegisteredUsersCart(id) {
            if (localStorage.getItem('product_id')) {
                let cart_products = '';
                let exist = false;
                let product_id = localStorage.getItem('product_id')
                let cart_product_check = product_id.split(',');
                for (let i = 0; i <= cart_product_check.length; i++) {
                    console.log('hello')
                    if (cart_product_check[i] == id) {
                        console.log('exists')
                        exist = true;
                    } else {
                        console.log('loging')
                    }
                }
                if (!exist) {
                    cart_products += product_id;
                    cart_products += id + ',';
                    localStorage.setItem('product_id', cart_products + '');
                    let containerCounter = $('.counter');
                    containerCounter.text(cart_product_check.length);
                } else {
                    console.log('exist');
                }
            } else {
                localStorage.setItem('product_id', id + ',');
            }
        }
    </script>
@endsection


@include('pages.rating-js', ['products' =>$ratings, 'type' => '"P"'])

