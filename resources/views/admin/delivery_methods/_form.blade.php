@if (!config('adminlte.enabled_laravel_mix'))
    @php($cssSectionName = 'css')
    @php($javaScriptSectionName = 'js')
@else
    @php($cssSectionName = 'mix_adminlte_css')
    @php($javaScriptSectionName = 'mix_adminlte_js')
@endif

@section($cssSectionName)
    <link rel="stylesheet" href="{{ mix('css/fileinput.css', 'build') }}">
@endsection

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="uzbek" role="tabpanel">
                        <div class="form-group">
                            {!! Form::label('name_uz', 'Nomi', ['class' => 'col-form-label']); !!}
                            {!! Form::text('name_uz', old('name_uz', $delivery ? $delivery->name_uz : null), ['class'=>'form-control' . ($errors->has('name_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_uz') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_uz', 'Tavsifi', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('description_uz', old('description_uz', $delivery ? $delivery->description_uz : null),
                                ['class' => 'form-control' . $errors->has('description_uz') ? ' is-invalid' : '', 'id' => 'description_uz', 'rows' => 10]); !!}
                            @if ($errors->has('description_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('description_uz') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="russian" role="tabpanel">
                        <div class="form-group">
                            {!! Form::label('name_ru', 'Название', ['class' => 'col-form-label']); !!}
                            {!! Form::text('name_ru', old('name_ru', $delivery ? $delivery->name_ru : null), ['class'=>'form-control' . ($errors->has('name_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_ru') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_ru', 'Описание', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('description_ru', old('description_ru', $delivery ? $delivery->description_ru : null),
                                ['class' => 'form-control' . $errors->has('description_ru') ? ' is-invalid' : '', 'id' => 'description_ru', 'rows' => 10]); !!}
                            @if ($errors->has('description_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('description_ru') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="english" role="tabpanel">
                        <div class="form-group">
                            {!! Form::label('name_en', 'Name', ['class' => 'col-form-label']); !!}
                            {!! Form::text('name_en', old('name_en', $delivery ? $delivery->name_en : null), ['class'=>'form-control' . ($errors->has('name_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_en') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_en', 'Description', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('description_en', old('description_en', $delivery ? $delivery->description_en : null),
                                ['class' => 'form-control' . $errors->has('description_en') ? ' is-invalid' : '', 'id' => 'description_en', 'rows' => 10]); !!}
                            @if ($errors->has('description_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('description_en') }}</strong></span>
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
        <div class="card card-green card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('cost', trans('adminlte.cost'), ['class' => 'col-form-label']); !!}
                            {!! Form::number('cost', old('price_uzs', $delivery ? $delivery->cost : null),
                                    ['class'=>'form-control' . ($errors->has('cost') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('cost'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('cost') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('min_weight', trans('adminlte.delivery.min_weight'), ['class' => 'col-form-label']); !!}
                            {!! Form::number('min_weight', old('min_weight', $delivery ? $delivery->min_weight : null),
                                    ['class'=>'form-control' . ($errors->has('min_weight') ? ' is-invalid' : ''), 'step' => '0.01']) !!}
                            @if ($errors->has('min_weight'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('min_weight') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('max_weight', trans('adminlte.delivery.max_weight'), ['class' => 'col-form-label']); !!}
                            {!! Form::number('max_weight', old('max_weight', $delivery ? $delivery->max_weight : null),
                                    ['class'=>'form-control' . ($errors->has('max_weight') ? ' is-invalid' : ''), 'step' => '0.01']) !!}
                            @if ($errors->has('max_weight'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('max_weight') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($delivery ? 'edit' : 'save')) }}</button>
</div>

@section($javaScriptSectionName)
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description_uz');
        CKEDITOR.replace('description_ru');
        CKEDITOR.replace('description_en');
    </script>

@endsection
