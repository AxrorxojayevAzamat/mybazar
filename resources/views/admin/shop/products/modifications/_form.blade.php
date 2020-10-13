@if (!config('adminlte.enabled_laravel_mix'))
    @php($cssSectionName = 'css')
    @php($javaScriptSectionName = 'js')
@else
    @php($cssSectionName = 'mix_adminlte_css')
    @php($javaScriptSectionName = 'mix_adminlte_js')
@endif

@section($cssSectionName)
    <link rel="stylesheet" href="{{ mix('css/fileinput.css', 'build') }}">
    <link rel="stylesheet" href="{{ mix('css/colorpicker.css', 'build') }}">
@endsection

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.main') }}</h3></div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('name_uz', 'Nomi', ['class' => 'col-form-label']); !!}
                    {!! Form::text('name_uz', old('name_uz', $modification ? $modification->name_uz : null), ['class'=>'form-control' . ($errors->has('name_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
                    @if ($errors->has('name_uz'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('name_uz') }}</strong></span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('name_ru', 'Название', ['class' => 'col-form-label']); !!}
                    {!! Form::text('name_ru', old('name_ru', $modification ? $modification->name_ru : null), ['class'=>'form-control' . ($errors->has('name_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
                    @if ($errors->has('name_ru'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('name_ru') }}</strong></span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('name_en', 'Name', ['class' => 'col-form-label']); !!}
                    {!! Form::text('name_en', old('name_en', $modification ? $modification->name_en : null), ['class'=>'form-control' . ($errors->has('name_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                    @if ($errors->has('name_en'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('name_en') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-green card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('code', trans('adminlte.code'), ['class' => 'col-form-label']); !!}
                            {!! Form::text('code', old('discount', $modification ? $modification->code : null),
                                    ['class'=>'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'maxlength' => 20]) !!}
                            @if ($errors->has('code'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('code') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('price_uzs', trans('adminlte.price_uzs'), ['class' => 'col-form-label']); !!}
                            {!! Form::number('price_uzs', old('price_uzs', $modification ? $modification->price_uzs : null),
                                    ['class'=>'form-control' . ($errors->has('price_uzs') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('price_uzs'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('price_uzs') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('price_usd', trans('adminlte.price_usd'), ['class' => 'col-form-label']); !!}
                            {!! Form::number('price_usd', old('price_usd', $modification ? $modification->price_usd : null),
                                    ['class'=>'form-control' . ($errors->has('price_usd') ? ' is-invalid' : ''), 'step' => '0.01']) !!}
                            @if ($errors->has('price_usd'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('price_usd') }}</strong></span>
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
        <div class="card card-danger card-outline">
            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.value.characteristic_value') }}</h3></div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('characteristic_id', trans('adminlte.characteristic.name'), ['class' => 'col-form-label']); !!}
                        {!! Form::select('characteristic_id', $characteristics, $modification ? $modification->characteristic_id : null,
                            ['class'=>'form-control' . ($errors->has('characteristic_id') ? ' is-invalid' : ''), 'id' => 'characteristic_id',
                            'placeholder' => '']) !!}
                        @if ($errors->has('characteristic_id'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('characteristic_id') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12" id="characteristic-form"></div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="value-form">
    <div class="col-md-12">
        <div class="card card-danger card-outline">
            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.value.name') }}</h3></div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::text('value', old('value', $modification ? $modification->value : null),
                        ['class'=>'form-control' . ($errors->has('value') ? ' is-invalid' : ''), 'id' => 'modification-value']) !!}
                    @if ($errors->has('value'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('value') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="color-form">
    <div class="col-md-12">
        <div class="card card-warning card-outline">
            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.color') }}</h3></div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::text('color', old('color', $modification ? $modification->color : null),
                        ['class' => 'form-control' . ($errors->has('color') ? ' is-invalid' : ''), 'id' => 'modification-color']) !!}
                    @if ($errors->has('color'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('color') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="photo_form">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.photo.name') }}</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <div class="file-loading">
                        <input id="file-input" class="file" type="file" name="photo">
                    </div>
                    @if ($errors->has('photo'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('photo') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($modification ? 'edit' : 'save')) }}</button>
</div>

@include('admin.shop.products.modifications._scripts')
