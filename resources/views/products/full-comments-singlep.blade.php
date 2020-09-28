<section>
    <div class="outter-full-comments">
        <div class="comments">
            <div class="sort-by">
                <button class="btn sort-by-btn by-price">@lang('frontend.by_date')<i></i></button>
                <button class="btn sort-by-btn by-rating">@lang('frontend.by_rating')<i></i></button>
            </div>
            @foreach($product->reviews()->limit(5)->orderByDesc('created_at')->get() as $review)
                <div class="item">
                    <div class="user-with-rating">
                        <div class="user">
                            <div class="user-ava">
                                <img src="{{ asset('images/username-default-ava.png') }}" alt="">
                            </div>
                            <div class="user-name">
                                @php($user = $review->user)
                                <h6>{{ $user->name }}</h6>
                                @if ($user->haveBoughtProduct($product->id))
                                    <p class="green">@lang('frontend.product.have_bought')</p>
                                @else
                                    <p class="red">@lang('frontend.product.have_not_bought')</p>
                                @endif
                            </div>
                        </div>
                        <div class="voted-rate">
                            <div class="rating stars">
                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Meh">5 stars</label>
                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Kinda bad">4 stars</label>
                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Kinda bad">3 stars</label>
                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>
                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                            </div>
                        </div>
                    </div>
                    <p class="date">{{ $review->created_at }}</p>
                    <h6>@lang('frontend.review.advantages')</h6>
                    <p>{{ $review->advantages }}</p>

                    <h6>@lang('frontend.review.disadvantages')</h6>
                    <p>{{ $review->disadvantages }}</p>

                    <h6>Коментарий</h6>
                    <p>{{ $review->comment }}</p>
                </div>
            @endforeach
        </div>
        <div class="leave-comment">
            @if (!Auth::guest())
                <h6 class="title">@lang('frontend.review.write')</h6>
                <form method="POST" action="{{ route('products.add-review', $product) }}" id="review-form">
                    @csrf
                    <div class="new-rate">
                        <div class="rating stars">
                            <input type="radio" id="product-review-star5" name="rating" value="5" required /><label for="product-review-star5" title="Meh">5 stars</label>
                            <input type="radio" id="product-review-star4" name="rating" value="4" /><label for="product-review-star4" title="Kinda bad">4 stars</label>
                            <input type="radio" id="product-review-star3" name="rating" value="3" /><label for="product-review-star3" title="Kinda bad">3 stars</label>
                            <input type="radio" id="product-review-star2" name="rating" value="2" /><label for="product-review-star2" title="Sucks big tim">2 stars</label>
                            <input type="radio" id="product-review-star1" name="rating" value="1" /><label for="product-review-star1" title="Sucks big time">1 star</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for=review-advantages>@lang('frontend.review.advantages')</label>
                        <textarea class="form-control" id="review-advantages" name="advantages"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="review-disadvantages">@lang('frontend.review.disadvantages')</label>
                        <textarea class="form-control" id="review-disadvantages" name="disadvantages"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="review-comment">@lang('frontend.review.comment')</label>
                        <textarea class="form-control" id="review-comment" name="comment" required></textarea>
                    </div>

                    <input type="submit" id="submit-review" value="{{ trans('frontend.send') }}">
                </form>
            @else
                <p>@lang('frontend.log_in_to_review')</p>
            @endif

        </div>
    </div>
</section>
