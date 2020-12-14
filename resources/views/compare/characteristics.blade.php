<div class="accordion" id="fullCharacteristicsCollapse{{$i}}">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn " type="button" data-toggle="collapse" data-target="#collapse-{{ $i }}"
                        aria-expanded="true" aria-controls="collapseOne" title="{{ $product->id }}">
                    {!! $values->characteristic->name !!}
                </button>
            </h2>
        </div>
        <div id="collapse-{{ $i }}" class="collapse show" aria-labelledby="heading-{{ $i }}"
             data-parent="#fullCharacteristicsCollapse{{$i}}">
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

