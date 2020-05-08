<div class="tab-content">
    <div class="tab-pane active" id="uzbek" role="tabpanel">
        <div class="form-group">
            {!! Form::label('name_uz', 'Nomi', ['class' => 'col-form-label']); !!}
            {!! Form::text('name_uz', old('name_uz', $product ? $product->name_uz : null), ['class'=>'form-control' . ($errors->has('name_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
            @if ($errors->has('name_uz'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name_uz') }}</strong></span>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('description_uz', 'Tavsifi', ['class' => 'col-form-label']); !!}
            {!! Form::textarea('description_uz', old('description_uz', $product ? $product->description_uz : null),
                ['class' => 'col-form-label' . $errors->has('description_uz') ? ' is-invalid' : '', 'id' => 'description_uz', 'rows' => 10]); !!}
            @if ($errors->has('description_uz'))
                <span class="invalid-feedback"><strong>{{ $errors->first('description_uz') }}</strong></span>
            @endif
        </div>
    </div>
    <div class="tab-pane" id="russian" role="tabpanel">
        <div class="form-group">
            {!! Form::label('name_ru', 'Название', ['class' => 'col-form-label']); !!}
            {!! Form::text('name_ru', old('name_ru', $product ? $product->name_ru : null), ['class'=>'form-control' . ($errors->has('name_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
            @if ($errors->has('name_ru'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name_ru') }}</strong></span>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('description_ru', 'Описание', ['class' => 'col-form-label']); !!}
            {!! Form::textarea('description_ru', old('description_ru', $product ? $product->description_ru : null),
                ['class' => 'col-form-label' . $errors->has('description_ru') ? ' is-invalid' : '', 'id' => 'description_ru', 'rows' => 10]); !!}
            @if ($errors->has('description_ru'))
                <span class="invalid-feedback"><strong>{{ $errors->first('description_ru') }}</strong></span>
            @endif
        </div>
    </div>
    <div class="tab-pane" id="english" role="tabpanel">
        <div class="form-group">
            {!! Form::label('name_en', 'Название', ['class' => 'col-form-label']); !!}
            {!! Form::text('name_en', old('name_en', $product ? $product->name_en : null), ['class'=>'form-control' . ($errors->has('name_en') ? ' is-invalid' : ''), 'required' => true]) !!}
            @if ($errors->has('name_en'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name_en') }}</strong></span>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('description_en', 'Description', ['class' => 'col-form-label']); !!}
            {!! Form::textarea('description_en', old('description_en', $product ? $product->description_en : null),
                ['class' => 'col-form-label' . $errors->has('description_en') ? ' is-invalid' : '', 'id' => 'description_en', 'rows' => 10]); !!}
            @if ($errors->has('description_en'))
                <span class="invalid-feedback"><strong>{{ $errors->first('description_en') }}</strong></span>
            @endif
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug', ['class' => 'col-form-label']); !!}
    {!! Form::text('slug', old('slug', $product ? $product->slug : null), ['class'=>'form-control' . ($errors->has('slug') ? ' is-invalid' : ''), 'id' => 'slug', 'required' => true]) !!}
    @if ($errors->has('slug'))
        <span class="invalid-feedback"><strong>{{ $errors->first('slug') }}</strong></span>
    @endif
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('categories', trans('adminlte.category.name'), ['class' => 'col-form-label']); !!}
            {!! Form::select('categories[]', $categories, old('categories', $product ? $product->categoriesList() : null),
                ['multiple' => true, 'class'=>'form-control' . ($errors->has('categories') ? ' is-invalid' : ''), 'id' => 'categories', 'required' => true]) !!}
            @if ($errors->has('categories'))
                <span class="invalid-feedback"><strong>{{ $errors->first('categories') }}</strong></span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('store_id', trans('adminlte.store.name'), ['class' => 'col-form-label']); !!}
            {!! Form::select('store_id', $stores, old('store_id', $product ? $product->store_id : null),
                ['class'=>'form-control' . ($errors->has('store_id') ? ' is-invalid' : ''), 'required' => true]) !!}
            @if ($errors->has('store_id'))
                <span class="invalid-feedback"><strong>{{ $errors->first('store_id') }}</strong></span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('brand_id', trans('adminlte.brand.name'), ['class' => 'col-form-label']); !!}
            {!! Form::select('brand_id', $brands, old('brand_id', $product ? $product->brand_id : null),
                ['class'=>'form-control' . ($errors->has('brand_id') ? ' is-invalid' : ''), 'required' => true]) !!}
            @if ($errors->has('brand_id'))
                <span class="invalid-feedback"><strong>{{ $errors->first('brand_id') }}</strong></span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('price_uzs', trans('adminlte.product.price_uzs'), ['class' => 'col-form-label']); !!}
            {!! Form::number('price_uzs', old('price_uzs', $product ? $product->price_uzs : null),
                    ['class'=>'form-control' . ($errors->has('price_uzs') ? ' is-invalid' : ''), 'step' => '0.01', 'required' => true]) !!}
            @if ($errors->has('price_uzs'))
                <span class="invalid-feedback"><strong>{{ $errors->first('price_uzs') }}</strong></span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('price_usd', trans('adminlte.product.price_usd'), ['class' => 'col-form-label']); !!}
            {!! Form::number('price_usd', old('price_usd', $product ? $product->price_usd : null),
                    ['class'=>'form-control' . ($errors->has('price_usd') ? ' is-invalid' : ''), 'step' => '0.01']) !!}
            @if ($errors->has('price_usd'))
                <span class="invalid-feedback"><strong>{{ $errors->first('price_usd') }}</strong></span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('discount', trans('adminlte.product.discount'), ['class' => 'col-form-label']); !!}
            {!! Form::number('discount', old('discount', $product ? $product->discount : null),
                    ['class'=>'form-control' . ($errors->has('discount') ? ' is-invalid' : ''), 'step' => '0.01']) !!}
            @if ($errors->has('discount'))
                <span class="invalid-feedback"><strong>{{ $errors->first('discount') }}</strong></span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('status', trans('adminlte.status'), ['class' => 'col-form-label']); !!}
            {!! Form::select('status', \App\Helpers\ProductHelper::getStatusList(), old('status', $product ? $product->status : null),
                    ['class'=>'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'required' => true]) !!}
            @if ($errors->has('status'))
                <span class="invalid-feedback"><strong>{{ $errors->first('status') }}</strong></span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('weight', trans('adminlte.product.weight'), ['class' => 'col-form-label']); !!}
            {!! Form::number('weight', old('weight', $product ? $product->weight : null),
                    ['class'=>'form-control' . ($errors->has('weight') ? ' is-invalid' : ''), 'step' => '0.01']) !!}
            @if ($errors->has('weight'))
                <span class="invalid-feedback"><strong>{{ $errors->first('weight') }}</strong></span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('quantity', trans('adminlte.product.quantity'), ['class' => 'col-form-label']); !!}
            {!! Form::number('quantity', old('quantity', $product ? $product->quantity : null),
                    ['class'=>'form-control' . ($errors->has('quantity') ? ' is-invalid' : '')]) !!}
            @if ($errors->has('quantity'))
                <span class="invalid-feedback"><strong>{{ $errors->first('quantity') }}</strong></span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group" style="margin-right: 20px;">
        {!! Form::label('guarantee', trans('adminlte.product.guarantee'), ['class' => 'col-form-label']); !!}
        {!! Form::checkbox('guarantee', 1, old('guarantee', $product ? $product->guarantee : null),
                ['class'=>'form-control' . ($errors->has('guarantee') ? ' is-invalid' : '')/*, 'required' => true*/]) !!}
        @if ($errors->has('guarantee'))
            <span class="invalid-feedback"><strong>{{ $errors->first('guarantee') }}</strong></span>
        @endif
    </div>
    <div class="form-group" style="margin-right: 20px;">
        {!! Form::label('bestseller', trans('adminlte.product.bestseller'), ['class' => 'col-form-label']); !!}
        {!! Form::checkbox('bestseller', 1, old('bestseller', $product ? $product->bestseller : null),
                ['class'=>'form-control' . ($errors->has('bestseller') ? ' is-invalid' : '')/*, 'required' => true*/]) !!}
        @if ($errors->has('bestseller'))
            <span class="invalid-feedback"><strong>{{ $errors->first('bestseller') }}</strong></span>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('new', trans('adminlte.new'), ['class' => 'col-form-label']); !!}
        {!! Form::checkbox('new', 1, old('new', $product ? $product->quantity : null),
                ['class'=>'form-control' . ($errors->has('new') ? ' is-invalid' : '')/*, 'required' => true*/]) !!}
        @if ($errors->has('new'))
            <span class="invalid-feedback"><strong>{{ $errors->first('new') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($product ? 'edit' : 'save')) }}</button>
</div>

@section('mix_adminlte_js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/select2/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description_uz');
        CKEDITOR.replace('description_ru');
        CKEDITOR.replace('description_en');
        $('#categories').select2();
        $('#store_id').select2();
        $('#brand_id').select2();
    </script>
@endsection
