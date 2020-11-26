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
    function addCart(id) {
        let product_id = {};
        product_id.data = [];
        product_id.product_id = id;
        //
        // let send = XMLHttpRequest.prototype.send, token = $('meta[name="csrf-token"]').attr('content');
        // XMLHttpRequest.prototype.send = function (data) {
        //     this.setRequestHeader('X-CSRF-Token', token);
        //     return send.apply(this, arguments);
        // };

        $.ajax({
            url: 'add-cart',
            method: 'POST',
            data: product_id,
            dataType: 'json',
            success: function (data) {
                if (data.message == 'success'){
                    localStorage.removeItem('product_id');
                    // delete $.ajaxSettings.headers['X-CSRF-Token'];
                    console.log('exists');
                }else{
                    nonRegisteredUsersCart(id);
                    console.log($.ajaxSettings.headers);
                    console.log('isnotexists');
                }
            }, error: function (data) {

            }
        })

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        //     }
        // })
        //
        // $.ajax({
        //     url: 'remove-cart',
        //     method: 'POST',
        //     data: product_id,
        //     dataType: 'json',
        //     success: function (data) {
        //         console.log(data);
        //     }, error: function (data) {
        //         console.log(data);
        //     }
        // })

    }
    function nonRegisteredUsersCart(id){
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
            } else {
                console.log('exist');
            }
        } else {
            localStorage.setItem('product_id', id + ',');
        }
    }


</script>

@include('pages.rating-js', ['products' => $products, 'type' => $rate_for['js']])

