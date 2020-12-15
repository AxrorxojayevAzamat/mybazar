<div class="outter-full-characteristics">
    <div class="accordion-characteristics">
        <button type="button" class="btn accordion active">@lang('frontend.all_charactires')</button>
        <div id="filter1" class="panel">
            @if(count($product->modifications) > 0)
            @foreach($product->allCharacteristics as $characteristics)
                    @if($characteristics->characteristic->type != \App\Entity\Shop\Characteristic::TYPE_COLOR)
                        @if(!empty($characteristics->modifications->value))
                            <p class="grey">{{ $characteristics->characteristic->name }}</p>
                        @endif
                        <p class="black">
                            @foreach($product->modificationsForProduct($characteristics->characteristic_id) as $modifications)
                                {{ $modifications->value }}
                            @endforeach
                        </p>
                    @endif
            @endforeach
            @else
            <h4>{{ trans('frontend.product.no_charasteric') }}</h4>
            @endif
        </div>
    </div>
</div>
