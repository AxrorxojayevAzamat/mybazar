<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.main') }}</h3></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('name_uz', 'Nomi', ['class' => 'col-form-label']); !!}
                            {!! Form::text('name_uz', old('name_uz', $category ? $category->name_uz : null), ['class'=>'form-control' . ($errors->has('name_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_uz') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('name_ru', 'Название', ['class' => 'col-form-label']); !!}
                            {!! Form::text('name_ru', old('name_ru', $category ? $category->name_ru : null), ['class'=>'form-control' . ($errors->has('name_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_ru') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('name_en', 'Name', ['class' => 'col-form-label']); !!}
                            {!! Form::text('name_en', old('name_en', $category ? $category->name_en : null), ['class'=>'form-control' . ($errors->has('name_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_en') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('type', trans('adminlte.category.name'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('type', \App\Entity\Blog\Category::typeList(), old('type', $category ? $category->type : null),
                                ['class'=>'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('type'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('type') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
