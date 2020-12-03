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
@include ('admin.layout.flash')
<div class="row">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
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
                <div class="row">
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

                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('group_id', trans('adminlte.characteristic.group_name'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('group_id', $groups, old('group_id', $characteristic ? $characteristic->group_id : null),
                                ['class'=>'form-control' . ($errors->has('group_id') ? ' is-invalid' : ''), 'id' => 'group_id', 'required' => true]) !!}
                            @if ($errors->has('group_id'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('group_id') }}</strong></span>
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
                    <div class="col-md-2">
                        <div class="form-group">
                            {!! Form::label('required', trans('adminlte.required'), ['class' => 'col-form-label']); !!}
                            {!! Form::checkbox('required', 1, old('required', $characteristic ? $characteristic->required : null),
                                    ['class'=>'form-control' . ($errors->has('required') ? ' is-invalid' : '')]) !!}
                            @if ($errors->has('required'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('required') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            {!! Form::label('hide_in_filters', trans('adminlte.characteristic.hide_in_filters'), ['class' => 'col-form-label']); !!}
                            {!! Form::checkbox('hide_in_filters', 1, old('hide_in_filters', $characteristic ? $characteristic->hide_in_filters : null),
                                    ['class'=>'form-control' . ($errors->has('hide_in_filters') ? ' is-invalid' : '')]) !!}
                            @if ($errors->has('hide_in_filters'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('hide_in_filters') }}</strong></span>
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
        $('#group_id').select2();
    </script>
@endsection
