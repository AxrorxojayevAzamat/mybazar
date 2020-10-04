<section>
    <div class="recommended">
        <div class="h4-title">
            <h4 class="title">Рекомендуем</h4>
        </div>
        <div class="outter-products">
            <div class="products row owl-carousel owl-theme">
                @foreach($products_new as $product_new)
                <div class="item">
                    <div class="product-img">
                        @if ($product_new->mainPhoto)
                            <img src="{{ $product_new->mainPhoto->fileOriginal }}" alt="">
                        @endif
                    </div>
                    <div class="description">
                        <h6 class="title">{{$product_new->name}}</h6>
                        <p class="sub-title">
                            @foreach($product_new->categories as $category)
                                <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a><br>
                            @endforeach
                        </p>
                        <div class="rate">
                            <div id="rateYo_R{{ $loop->index }}"></div>
                            <div class="comment">
                                <i class="mbcomment"></i>
                                <span>{{$product_new->number_of_reviews}}</span>
                            </div>
                        </div>
                        <div class="current-old-price horizontal">
                            <h5 class="price">{{$product_new->price_uzs}} <span>сум</span></h5>
                        </div>
                        <div class="item-action-icons">
                            <div class="libra" data-name="{{$product_new->name}}" data-price="{{$product_new->price_uzs}}"  data-url="{{asset('images/recomended1.png')}}"><i class="mbtocompare"></i></div>
                            <div class="cart" data-name="{{$product_new->name}}" data-price="{{$product_new->price_uzs}}"  data-url="{{asset('images/recomended1.png')}}"><i class="mbcart"></i></div>
                            <div class="like"><i class="mbfavorite"></i></div>
                        </div>
                        <p class="sub-title bottom">ООО "Samsung Electronics"</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@include('pages.rating-js', ['products' => $products_new, 'type' => '"R"'])
