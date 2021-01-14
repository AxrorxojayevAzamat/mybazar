<div class="accordion" id="fullCharacteristicsCollapse{{$i . $product->id}}">
    <div class="card">
        <div class="card-header" id="heading-{{ $i . $product->id }}">
            <h2 class="mb-0">
                <button class="btn " type="button" data-toggle="collapse" data-target="#collapse-{{ $i . $product->id }}"
                        aria-expanded="true" aria-controls="collapse-{{ $i . $product->id }}" title="{{ $product->id }}">
                    {!! $values->characteristic->name !!}
                </button>
            </h2>
        </div>
        <div id="collapse-{{ $i . $product->id }}" class="collapse show" aria-labelledby="heading-{{ $i . $product->id }}"
             data-parent="#fullCharacteristicsCollapse{{$i . $product->id}}">
            <div class="card-body">
                @if(empty(json_decode($product->modificationsForProduct($values->characteristic_id))))
                    <div class="item">
                        <p class="black">
                                ---
                        </p>
                    </div>
                @endif
                @foreach($product->modificationsForProduct($values->characteristic_id) as $value)
                    @if($value->characteristic->type !== \App\Entity\Shop\Characteristic::TYPE_COLOR)
                        <div class="item">
                            <p class="black">
                                    {{ $value->value }}
                            </p>
                        </div>
                    @endif
                    @if($value->characteristic->type == \App\Entity\Shop\Characteristic::TYPE_COLOR)
                        <div class="item">
                            <p class="black" style="width: 15px;height: 15px;border-radius: 50%;background-color: {{ $value->value }}"></p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

