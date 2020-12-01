@extends('layouts.app')

@section('title', trans('frontend.title.compare_page'))

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/compare.css')}}"> --}}
@endsection

@section('body')
    <section>
        <div class="h4-title compare">
            <h4 class="title">@lang('frontend.compare_products')</h4>
        </div>
        <div class="outter-compare-body">
            <div class="compare-items">
                <div class="items-view">
                    <div class="item">
                        <div class="image">
                            <img src="{{ $product->mainPhoto ? $product->mainPhoto->fileOriginal : null }}" alt="">
                            <button class="delete"><i class="mbexit_mobile"></i></button>
                        </div>
                        <h6 class="title">{{ $product->name }}</h6>
                        <div class="current-old-price horizontal">
                            <h5 class="price">@lang('frontend.product.price', ['price' => $product->price_uzs])</h5>
                        </div>
                        <div class="rate">
                            <div class="rating stars">
                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Meh">5 stars</label>
                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Kinda bad">4 stars</label>
                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Kinda bad">3 stars</label>
                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>
                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                            </div>
                        </div>
                        <div class="item-action-icons">
                            <div class="cart"><i class="mbcart"></i></div>
                            <div class="like"><i class="mbfavorite"></i></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="image">
                            <img src="{{ $comparingProduct->mainPhoto ? $comparingProduct->mainPhoto->fileOriginal : null }}" alt="">
                            <button class="delete"><i class="mbexit_mobile"></i></button>
                        </div>
                        <h6 class="title">{{ $comparingProduct->name }}</h6>
                        <div class="current-old-price horizontal">
                            <h5 class="price">@lang('frontend.product.price', ['price' => $comparingProduct->price_uzs])</h5>
                        </div>
                        <div class="rate">
                            <div class="rating stars">
                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Meh">5 stars</label>
                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Kinda bad">4 stars</label>
                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Kinda bad">3 stars</label>
                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>
                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                            </div>
                        </div>
                        <div class="item-action-icons">
                            <div class="cart"><i class="mbcart"></i></div>
                            <div class="like"><i class="mbfavorite"></i></div>
                        </div>
                    </div>
                </div>
                {{-- <div class="accordion" id="fullCharacteristicsCollapse"> --}}
                    <div class="row w-100">
                    @foreach($groupValues as $i => $values)
                        {{-- {{dd($groupValues)}} --}}
                        <div class="col-6">
                            <div class="accordion" id="fullCharacteristicsCollapse{{$i}}">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn " type="button" data-toggle="collapse" data-target="#collapse-{{ $i }}" aria-expanded="true" aria-controls="collapseOne">
                                                {{ $values[0]->characteristic->group->name }}
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapse-{{ $i }}" class="collapse show" aria-labelledby="heading-{{ $i }}" data-parent="#fullCharacteristicsCollapse{{$i}}">
                                        <div class="card-body">
                                            <div class="item">
                                                @foreach($values as $j => $value)
                                                    <p class="grey">{{ $value->characteristic->name }}</p>
                                                    <p class="black">{{ $value->value }}</p>
                                                @endforeach
                                            </div>
                                            <div class="item">
                                                @foreach($comparingGroupValues[$i] as $j => $value)
                                                    <p class="grey">{{ $value->characteristic->name }}</p>
                                                    <p class="black">{{ $value->value }}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
@endsection
