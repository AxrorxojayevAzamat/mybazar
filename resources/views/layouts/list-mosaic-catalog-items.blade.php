<div class="all-filtered-items">
    @foreach($products as $product)
    <div class="item">
        <div class="product-img">
            @if ($product->mainPhoto)
                <img src="{{ $product->mainPhoto->fileOriginal }}" alt="">
            @endif
        </div>
        <!-- description -->
        <div class="description ">
            <h6 class="title">{{$product->name}}</h6>
            <p class="sub-title">
                @foreach($product->categories as $category)
                    <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a><br>
                @endforeach
            </p>
            <div class="rate">
                <div class="rating stars">
                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Meh">5 stars</label>
                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Kinda bad">4 stars</label>
                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Kinda bad">3 stars</label>
                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>
                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                </div>
                <div class="comment">
                    <i class="mbcomment"></i>
                    <span>{{$product->number_of_reviews}}</span>
                </div>
            </div>
            <div class="list-full-des">
                <!-- display -->
                <h6 class="bold sub-title1">Экран</h6>
                <p>Диагональ: <span>50" (127см)</span></p>
                <p>Технология: <span>LED</span></p>
                <p>Разрешение экрана: <span>380х2160 Пикс (4K Ultra HD)</span></p>
                <p>Поддержка HDR: <span>Есть</span> </p>
                <!-- functionality -->
                <h6 class="bold sub-title2">Функции</h6>
                <p class="functions">SmartTV, Воспроизведение видео через USB</p>
                <!-- user interfrace -->
                <h6 class="bold sub-title3">Интерфейсы</h6>
                <p>HDMI: <span>3</span> </p>
                <p>Кол-во разюемов: <span>3</span> </p>
                <p>Wi-Fi: <span>Есть </span> </p>
                <p>Ethernet: <span>Есть </span> </p>
                <p class="catalog-item-color">Цвет: <span></span> </p>
            </div>
            <div class="current-old-price horizontal">
                <h5 class="price">{{$product->price_uzs}} <span>сум</span></h5>
                <h6 class="old-price">855 790 <span>сум</span></h6>
            </div>
            <div class="item-action-icons">
                <div class="cart" data-name="Телевизор Samsung QE55Q77RAU" data-url="{{asset('images/tv6.png')}}" data-price="741640"><i class="mbcart"></i>В корзину</div>
                <div class="libra"data-name="Телевизор Samsung QE55Q77RAU" data-url="{{asset('images/tv6.png')}}" data-price="741640"><i class="mbtocompare"></i></div>
                <div class="like"><i class="mbfavorite"></i></div>
            </div>
            <div class="delivery-options">
                <div><i class="mbdelievery"></i> Доставка в течении сутки</div>
                <div><i class="mbbox"></i>Самовывоз, с 8 апреля</div>
            </div>
            <p class="sub-title bottom">{{$product->store->name}}</p>
        </div>
        <!-- end description -->
    </div>
    @endforeach
    <!-- Banner should be after even number of products, otherwise products wouldn't wrap correctly! -->
    <div class="catalog-banner"></div>
</div>
