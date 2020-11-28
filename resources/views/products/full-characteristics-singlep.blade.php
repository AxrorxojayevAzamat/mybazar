<div class="outter-full-characteristics">
    <div class="accordion-characteristics">
        <button type="button" class="btn accordion active">{{ trans('frontend.product.all_characteristics') }}</button>
        <div id="filter1" class="panel">
            @if(count($product->values) > 0)
            @foreach($product->values as $value)
                <p class="grey">{{ $value->characteristic->name }}</p>
                <p class="black">{{ $value->value }}</p>
            @endforeach
            @else
            <h4>{{ trans('frontend.product.no_charasteric') }}</h4>
            @endif
        </div>
    </div>
</div>
