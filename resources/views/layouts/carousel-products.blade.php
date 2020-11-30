<section>
    <div class="carousel-products">
        <div class="h4-title">
            <h4 class="title">{{$title}}</h4>
        </div>
        <div class="outter-products">
            <div class="products owl-carousel owl-theme">
                @foreach ($products as $product)
                    @include('layouts.prorduct-item')

                @endforeach
            </div>
        </div>
    </div>
</section>
<script>
    function addToFavorite(id){
        let product_id = {};
        product_id.id = id;
        $.ajax({
            url: 'add-to-favorite/'+ id,
            method: 'GET',
            success: function (data){
                console.log(data);
            },error: function (data){
                console.log(data);
            }
        })
    }



</script>

@include('pages.rating-js', ['products' => $products, 'type' => $rate_for['js']])

