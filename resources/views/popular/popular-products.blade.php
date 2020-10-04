<section>
    <div class="popular-products">
        <div class="h4-title">
            <h4 class="title">Популярные</h4>
        </div>
        <div class="outter-products">
            <div class="products owl-carousel owl-theme">
                @foreach ($products_bestsellers as $bestseller)
                <div class="item">
                    <div class="product-img">
                        @if ($bestseller->mainPhoto)
                            <img src="{{ $bestseller->mainPhoto->fileOriginal }}" alt="">
                        @endif
                    </div>
                    <div class="description">
                        <h6 class="title">{{$bestseller->name}}</h6>
                        <p class="sub-title">
                            @foreach($bestseller->categories as $category)
                                <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a><br>
                            @endforeach
                        </p>
                        <div class="rate">
                            <div id="rateYo_B{{ $loop->index }}"></div>
                            <div class="comment">
                                <i class="mbcomment"></i>
                                <span>{{$bestseller->number_of_reviews}}</span>
                            </div>
                        </div>
                        <div class="current-old-price horizontal">
                            <h5 class="price">{{$bestseller->price_uzs}} <span>сум</span></h5>
                        </div>
                        <div class="item-action-icons">
                            <div class="cart" data-name="{{$bestseller->name}}" data-price="{{$bestseller->price_uzs}}" data-url="{{asset('images/popular1.png')}}"><i class="mbcart"></i></div>
                            <div class="libra"  data-name="{{$bestseller->name}}" data-price="{{$bestseller->price_uzs}}" data-url="{{asset('images/popular1.png')}}"><i class="mbtocompare"></i></div>
                            <div class="like"><i class="mbfavorite"></i></div>
                        </div>
                        <p class="sub-title bottom">{{$bestseller->store->name}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@include('pages.rating-js', ['products' => $products_bestsellers, 'type' => '"B"'])