@if (!config('adminlte.enabled_laravel_mix'))
    @php($cssSectionName = 'css')
    @php($javaScriptSectionName = 'js')
@else
    @php($cssSectionName = 'mix_adminlte_css')
    @php($javaScriptSectionName = 'mix_adminlte_js')
@endif
@include ('admin.layout.flash')
<div class="row">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
            <div class="card-body">
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
                                ['class' => 'form-control' . $errors->has('description_uz') ? ' is-invalid' : '', 'id' => 'description_uz', 'rows' => 10]); !!}
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
                                ['class' => 'form-control' . $errors->has('description_ru') ? ' is-invalid' : '', 'id' => 'description_ru', 'rows' => 10]); !!}
                            @if ($errors->has('description_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('description_ru') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="english" role="tabpanel">
                        <div class="form-group">
                            {!! Form::label('name_en', 'Name', ['class' => 'col-form-label']); !!}
                            {!! Form::text('name_en', old('name_en', $product ? $product->name_en : null), ['class'=>'form-control' . ($errors->has('name_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_en') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_en', 'Description', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('description_en', old('description_en', $product ? $product->description_en : null),
                                ['class' => 'form-control' . $errors->has('description_en') ? ' is-invalid' : '', 'id' => 'description_en', 'rows' => 10]); !!}
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
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            {!! Form::label('main_category_id', trans('adminlte.product.main_category'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('main_category_id', $categories, old('main_category_id', $product ? $product->main_category_id : null),
                                ['class'=>'form-control' . ($errors->has('main_category_id') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('main_category_id'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('main_category_id') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            {!! Form::label('categories', trans('adminlte.product.additional_categories'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('categories[]', $categories, old('categories', $product ? $product->categoriesList() : null),
                                ['multiple' => true, 'class'=>'form-control' . ($errors->has('categories') ? ' is-invalid' : ''), 'id' => 'categories', 'required' => true]) !!}
                            @if ($errors->has('categories'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('categories') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            {!! Form::label('store_id', trans('adminlte.store.name'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('store_id', $stores, old('store_id', $product ? $product->store_id : null),
                                ['class'=>'form-control' . ($errors->has('store_id') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('store_id'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('store_id') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            {!! Form::label('brand_id', trans('adminlte.brand.name'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('brand_id', $brands, old('brand_id', $product ? $product->brand_id : null),
                                ['class'=>'form-control' . ($errors->has('brand_id') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('brand_id'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('brand_id') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            {!! Form::label('marks', trans('adminlte.mark.name'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('marks[]', $marks, old('marks', $product ? $product->marksList() : null),
                                ['multiple' => true, 'class'=>'form-control' . ($errors->has('marks') ? ' is-invalid' : ''), 'id' => 'marks', 'required' => true]) !!}
                            @if ($errors->has('marks'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('marks') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('price_uzs', trans('adminlte.price_uzs'), ['class' => 'col-form-label']); !!}
                            {!! Form::number('price_uzs', old('price_uzs', $product ? $product->price_uzs : null),
                                    ['class'=>'form-control' . ($errors->has('price_uzs') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('price_uzs'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('price_uzs') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('price_usd', trans('adminlte.price_usd'), ['class' => 'col-form-label']); !!}
                            {!! Form::number('price_usd', old('price_usd', $product ? $product->price_usd : null),
                                    ['class'=>'form-control' . ($errors->has('price_usd') ? ' is-invalid' : ''), 'step' => '0.01']) !!}
                            @if ($errors->has('price_usd'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('price_usd') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('discount', trans('adminlte.product.discount'), ['class' => 'col-form-label']); !!}
                            {!! Form::number('discount', old('discount', $product ? $product->discount : null),
                                    ['class'=>'form-control' . ($errors->has('discount') ? ' is-invalid' : ''), 'step' => '0.01']) !!}
                            @if ($errors->has('discount'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('discount') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('discount_ends_at_date', trans('adminlte.product.discount_ends_at') . ' (' . trans('adminlte.date') . ')', ['class' => 'col-form-label']); !!}
                            {!! Form::date('discount_ends_at_date', old('discount_ends_at_date', $product && $product->discount_ends_at ? $product->discount_ends_at->format('Y-m-d') : null),
                                    ['class'=>'form-control' . ($errors->has('discount_ends_at_date') ? ' is-invalid' : '')]) !!}
                            @if ($errors->has('discount_ends_at_date'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('discount_ends_at_date') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            {!! Form::label('discount_ends_at_time', '(' . trans('adminlte.time') . ')', ['class' => 'col-form-label']); !!}
                            {!! Form::time('discount_ends_at_time', old('discount_ends_at_time', $product && $product->discount_ends_at ? $product->discount_ends_at->format('Y-m-d') : null),
                                    ['class'=>'form-control' . ($errors->has('discount_ends_at_time') ? ' is-invalid' : '')]) !!}
                            @if ($errors->has('discount_ends_at_time'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('discount_ends_at_time') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('weight', trans('adminlte.product.weight'), ['class' => 'col-form-label']); !!}
                            {!! Form::number('weight', old('weight', $product ? $product->weight : null),
                                    ['class'=>'form-control' . ($errors->has('weight') ? ' is-invalid' : ''), 'step' => '0.01']) !!}
                            @if ($errors->has('weight'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('weight') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('quantity', trans('adminlte.quantity'), ['class' => 'col-form-label']); !!}
                            {!! Form::number('quantity', old('quantity', $product ? $product->quantity : null),
                                    ['class'=>'form-control' . ($errors->has('quantity') ? ' is-invalid' : '')]) !!}
                            @if ($errors->has('quantity'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('quantity') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
            <div class="card-body">
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
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($product ? 'edit' : 'save')) }}</button>
</div>

@section($javaScriptSectionName)
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description_uz');
        CKEDITOR.replace('description_ru');
        CKEDITOR.replace('description_en');
        $('#main_category_id').select2();
        $('#categories').select2();
        $('#store_id').select2();
        $('#brand_id').select2();
        $('#marks').select2();
    </script>
@endsection
