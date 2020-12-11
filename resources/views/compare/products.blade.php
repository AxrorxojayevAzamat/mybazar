<?php
if ($product->classFavorite($product->id)) {
    $className = "selected_like";
}else{
    $className = '';
}
?>
<?php $name = $product->name  ?>
<div class="item">
    <div class="image">
        <img src="{{ $product->mainPhoto ? $product->mainPhoto->fileOriginal : null }}" alt="">
        <button class="delete" onclick="deleteFromCompare({{ $product->id }})"><a onclick="changeData()"><i class="mbexit_mobile"></i></a></button>
    </div>
    <b class="title"><a href="{{ route('products.show',['product' => $product]) }}"><?= substr($name,0,20)?></a></b>
    <div class="current-old-price horizontal">
        <h5 class="price">@lang('frontend.product.price', ['price' => $product->price_uzs])</h5>
    </div>
    <div class="rate">
    <div id="rateYo_P{{ $loop->index }}"></div>
    </div>
    <div class="item-action-icons">
        <div class="cart"><i class="mbcart"></i></div>
        <div class="like <?php echo $className ?>" onclick="addToFavorite({{ $product->id }})"><i class="mbfavorite"></i></div>
    </div>
</div>
