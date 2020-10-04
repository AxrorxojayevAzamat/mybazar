<section>
    <div class="newone">
        <div class="h4-title">
            <h4 class="title">Новинки</h4>
        </div>
        <div class="outter-products">
            <div class="products owl-carousel owl-theme">
                @foreach($products_new as $product_new)
                <div class="item">
                    <div class="product-img">
                        @if ($product_new->mainPhoto)
                            <img src="{{ $product_new->mainPhoto->fileOriginal }}" alt="">
                        @endif
                        <span class="new-product">НОВИНКА</span>
                    </div>
                    <div class="description">
                        <h6 class="title">{{$product_new->name}}</h6>
                        <p class="sub-title">
                            @foreach($product_new->categories as $category)
                                <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a><br>
                            @endforeach
                        </p>
                        <div class="rate">
                            <div id="rateYo_N{{ $loop->index}}"></div>
                            <div class="comment">
                                <i class="mbcomment"></i>
                                <span>{{$product_new->number_of_reviews}}</span>
                            </div>
                        </div>
                        <div class="current-old-price horizontal">
                            <h5 class="price">{{$product_new->price_uzs}} <span>сум</span></h5>
                        </div>
                        <div class="item-action-icons">
                            <div class="cart" data-name="{{$product_new->name}}" date-price="{{$product_new->price_uzs}}" data-url="{{asset('images/newone1.png')}}"><a href="{{ url('add-to-cart/'.$product_new->id) }}"><i class="mbcart"></i></a></div>
                            <div class="libra" data-name="{{$product_new->name}}" date-price="{{$product_new->price_uzs}}" data-url="{{asset('images/newone1.png')}}"><i class="mbtocompare"></i></div>
                            <div class="like"><i class="mbfavorite"></i></div>
                        </div>
                        <p class="sub-title bottom">{{$product_new->store->name}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


{{-- @section('script')
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
@endsection --}}

@include('pages.rating-js', ['products' => $products_new, 'type' => '"N"'])
