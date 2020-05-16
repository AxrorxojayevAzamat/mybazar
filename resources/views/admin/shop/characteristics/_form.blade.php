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
            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.main') }}</h3></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('name_uz', 'Nomi', ['class' => 'col-form-label']); !!}
                            {!! Form::text('name_uz', old('name_uz', $characteristic ? $characteristic->name_uz : null), ['class'=>'form-control' . ($errors->has('name_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_uz') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('name_ru', 'Название', ['class' => 'col-form-label']); !!}
                            {!! Form::text('name_ru', old('name_ru', $characteristic ? $characteristic->name_ru : null), ['class'=>'form-control' . ($errors->has('name_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_ru') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('name_en', 'Name', ['class' => 'col-form-label']); !!}
                            {!! Form::text('name_en', old('name_en', $characteristic ? $characteristic->name_en : null), ['class'=>'form-control' . ($errors->has('name_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_en') }}</strong></span>
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
{{--            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.type') }}</h3></div>--}}
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('type', trans('adminlte.type'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('type', $types, old('type', $characteristic ? $characteristic->type : null),
                                ['class'=>'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('type'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('type') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('default', trans('adminlte.default'), ['class' => 'col-form-label']); !!}
                            {!! Form::text('default', old('default', $characteristic ? $characteristic->default : null), ['class'=>'form-control' . ($errors->has('default') ? ' is-invalid' : '')]) !!}
                            @if ($errors->has('default'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('default') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('required', trans('adminlte.required'), ['class' => 'col-form-label']); !!}
                            {!! Form::checkbox('required', 1, old('required', $characteristic ? $characteristic->required : null),
                                    ['class'=>'form-control' . ($errors->has('required') ? ' is-invalid' : '')]) !!}
                            @if ($errors->has('required'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('required') }}</strong></span>
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
{{--            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.type') }}</h3></div>--}}
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('variants', trans('adminlte.characteristic.variants'), ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('variants', old('variants', $characteristic ? implode("\n", $characteristic->variants) : null),
                                ['class' => 'form-control' . ($errors->has('variants') ? ' is-invalid' : ''), 'rows' => 3]); !!}
                            @if ($errors->has('variants'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('variants') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('categories', trans('adminlte.category.name'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('categories[]', $categories, old('categories', $characteristic ? $characteristic->categoriesList() : null),
                                ['multiple' => true, 'class'=>'form-control' . ($errors->has('categories') ? ' is-invalid' : ''), 'id' => 'categories', 'required' => true]) !!}
                            @if ($errors->has('categories'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('categories') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($characteristic ? 'edit' : 'save')) }}</button>
</div>

@section($javaScriptSectionName)
    <script>
        $('#categories').select2();
    </script>
@endsection