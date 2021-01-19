<section>
    <div class="carousel-products">
        <div class="h4-title">
            <h4 class="title">{{$title}}</h4>
        </div>
        <div class="outter-products">
            <div class="products owl-carousel owl-theme">
                @foreach ($products as $product)
                    @include('layouts.product-item')
                @endforeach
            </div>
        </div>
    </div>
</section>
<script>
    function addToFavorite(id) {
        let product_id = {};
        product_id.id = id;
        $.ajax({
            url: 'add-to-favorite/' + id,
            method: 'GET',
            success: function (data) {
                console.log(data);
            }, error: function (data) {
                console.log(data);
            }
        })
    }

    function addToCompare(id) {
        if (localStorage.getItem('compare_product')) {
            let compare_products = '';
            let exist = false;
            let product_id = localStorage.getItem('compare_product')
            let cart_product_check = product_id.split(',');
            for (let i = 0; i <= cart_product_check.length; i++) {
                if (cart_product_check[i] == id) {
                    console.log('exists')
                    exist = true;
                }
            }
            if (!exist) {
                if (cart_product_check.length < 1){
                    compare_products += product_id;
                    compare_products += id + ',';
                    localStorage.setItem('compare_product', compare_products + '');
                    let containerCounter = $('.counter');
                    containerCounter.text(cart_product_check.length);
                }
                if (cart_product_check.length <= 3 && cart_product_check.length >= 1) {
                    $.ajax({
                        url: '/check-compare/' + id+'/' + cart_product_check[0] ,
                        method: 'GET',
                        success: function (data) {
                            if (data === "success"){
                                compare_products += product_id;
                                compare_products += id + ',';
                                localStorage.setItem('compare_product', compare_products + '');
                                let containerCounter = $('.counter');
                                containerCounter.text(cart_product_check.length);
                            }else{
                                alert('{{ trans('frontend.compare_not_fit') }}')
                                $(`[data-id="l${id}"]`).removeClass('selected_libra')
                            }
                        }, error: function (data) {
                            // console.log(data);
                        }
                    });
                } else {
                    alert('{{ trans('frontend.compare_full') }}')
                    $(`[data-id="l${id}"]`).removeClass('selected_libra')
                }

            }
        } else {
            localStorage.setItem('compare_product', id + ',');
        }
    }

</script>

@include('pages.rating-js', ['products' => $products, 'type' => $rate_for['js']])

