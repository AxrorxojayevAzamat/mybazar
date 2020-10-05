<section>
    <div class="newone">
        <div class="h4-title">
            <h4 class="title">Новинки</h4>
        </div>
        <div class="outter-products">
            <div class="products owl-carousel owl-theme">
                @foreach($newProducts as $product)
                <div class="item">
                    <div class="product-img">
                        @if ($product->mainPhoto)
                            <img src="{{ $product->mainPhoto->fileOriginal }}" alt="">
                        @endif
                        <span class="new-product">@lang('frontend.novelty_upper')</span>
                    </div>
                    <div class="description">
                        <h6 class="title">{{$product->name}}</h6>
                        <p class="sub-title">
{{--                            @foreach($product->categories as $category)--}}
{{--                                <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a><br>--}}
{{--                            @endforeach--}}
                            <a href="{{ route('categories.show', $product->mainCategory) }}">{{ $product->mainCategory->name }}</a><br>
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
                        <div class="current-old-price horizontal">
                            <h5 class="price">@lang('frontend.product.price', ['price' => $product->currentPriceUzs])</h5>
                        </div>
                        <div class="item-action-icons">
                            <div class="cart" data-name="{{$product->name}}" date-price="{{$product->price_uzs}}" data-url="{{asset('images/newone1.png')}}"><a href="{{ url('add-to-cart/'.$product->id) }}"><i class="mbcart"></i></a></div>
                            <div class="libra" data-name="{{$product->name}}" date-price="{{$product->price_uzs}}" data-url="{{asset('images/newone1.png')}}"><i class="mbtocompare"></i></div>
                            <div class="like"><i class="mbfavorite"></i></div>
                        </div>
                        <p class="sub-title bottom">{{$product->store->name}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


@section('scripts')


    <script type="text/javascript">

        $(".update-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>

@endsection
