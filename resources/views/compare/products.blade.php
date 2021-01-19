<?php
if ($product->classFavorite($product->id)) {
    $favoriteClass = "selected_like";
} else {
    $favoriteClass = '';
}

if ($product->classCart($product->id)) {
    $cartClass = "selected_cart";
} else {
    $cartClass = '';
}
?>
<?php $name = $product->name  ?>
<div class="item">
    <div class="image">
        <img src="{{ $product->mainPhoto ? $product->mainPhoto->fileOriginal : null }}" alt="">
        <button class="delete" onclick="deleteFromCompare({{ $product->id }})"><i class="mbexit_mobile"></i></button>
    </div>
    <b class="title"><a href="{{ route('products.show',['product' => $product]) }}"><?= substr($name,0,20)?></a></b>
    <div class="current-old-price horizontal">
        <h5 class="price">@lang('frontend.product.price', ['price' => $product->price_uzs])</h5>
    </div>
    <div class="rate">
    <div id="rateYo_P{{ $loop->index }}"></div>
    </div>
    <div class="item-action-icons">
        <div id="cartActive{{ $product->id }}" data-id="c{{ $product->id }}" class="cart <?php echo $cartClass ?>">
            <i class="mbcart"></i>
        </div>
        <div class="like <?php echo $favoriteClass ?>" onclick="addToFavorite({{ $product->id }})"><i class="mbfavorite"></i></div>
    </div>
    <script>
        localStorage.getItem('compare_product').split(',').forEach(el => {
            if (el === "{{$product->id}}") {
                $(`[data-id="l${el}"]`).addClass('selected_libra');
            }
        })
        @guest
        JSON.parse(localStorage.getItem('product_id')).forEach(el => {
            console.log(el)
            if (el.product_id === "{{$product->id}}") {
                console.log(el)
                $(`[data-id="c${el.product_id}"]`).addClass('selected_cart');
            }
        })
        @endguest
    </script>
</div>
