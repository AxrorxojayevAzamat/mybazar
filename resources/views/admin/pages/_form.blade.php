@if (!config('adminlte.enabled_laravel_mix'))
    @php($cssSectionName = 'css')
    @php($javaScriptSectionName = 'js')
@else
    @php($cssSectionName = 'mix_adminlte_css')
    @php($javaScriptSectionName = 'mix_adminlte_js')
@endif

@section($cssSectionName)
@endsection
@include ('admin.layout.flash')
<div class="row">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="uzbek" role="tabpanel">
                        <div class="form-group">
                            {!! Form::label('title_uz', 'Nomi', ['class' => 'col-form-label']); !!}
                            {!! Form::text('title_uz', old('title_uz', $page ? $page->title_uz : null), ['class'=>'form-control' . ($errors->has('title_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('title_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('title_uz') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('menu_title_uz', 'Menyudagi nomi', ['class' => 'col-form-label']); !!}
                            {!! Form::text('menu_title_uz', old('menu_title_uz', $page ? $page->menu_title_uz : null), ['class'=>'form-control' . ($errors->has('menu_title_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('menu_title_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('menu_title_uz') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_uz', 'Tavsifi', ['class' => 'col-form-label']); !!}
                            <br>
                            {!! Form::textarea('description_uz', old('description_uz', $page ? $page->description_uz : null),
                                ['class' => 'form-control' . $errors->has('description_uz') ? ' is-invalid' : '', 'id' => 'description_uz', 'rows' => 10]); !!}
                            @if ($errors->has('description_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('description_uz') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('body_uz', 'Asosiy qismi', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('body_uz', old('body_uz', $page ? $page->body_uz : null),
                                ['class' => 'form-control' . $errors->has('body_uz') ? ' is-invalid' : '', 'id' => 'body_uz', 'rows' => 10]); !!}
                            @if ($errors->has('body_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('body_uz') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="russian" role="tabpanel">
                        <div class="form-group">
                            {!! Form::label('title_ru', 'Название', ['class' => 'col-form-label']); !!}
                            {!! Form::text('title_ru', old('title_ru', $page ? $page->title_ru : null), ['class'=>'form-control' . ($errors->has('title_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('title_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('title_ru') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('menu_title_ru', 'Название меню', ['class' => 'col-form-label']); !!}
                            {!! Form::text('menu_title_ru', old('menu_title_ru', $page ? $page->menu_title_ru : null), ['class'=>'form-control' . ($errors->has('menu_title_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('menu_title_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('menu_title_ru') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_ru', 'Описание', ['class' => 'col-form-label']); !!}
                            <br>
                            {!! Form::textarea('description_ru', old('description_ru', $page ? $page->description_ru : null),
                                ['class' => 'form-control' . $errors->has('description_ru') ? ' is-invalid' : '', 'id' => 'description_ru', 'rows' => 10]); !!}
                            @if ($errors->has('description_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('description_ru') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('body_ru', 'Основная часть', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('body_ru', old('body_ru', $page ? $page->body_ru : null),
                                ['class' => 'form-control' . $errors->has('body_ru') ? ' is-invalid' : '', 'id' => 'body_ru', 'rows' => 10]); !!}
                            @if ($errors->has('body_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('body_ru') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="english" role="tabpanel">
                        <div class="form-group">
                            {!! Form::label('title_en', 'Title', ['class' => 'col-form-label']); !!}
                            {!! Form::text('title_en', old('title_en', $page ? $page->title_en : null), ['class'=>'form-control' . ($errors->has('title_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('title_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('title_en') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('menu_title_en', 'Menu title', ['class' => 'col-form-label']); !!}
                            {!! Form::text('menu_title_en', old('menu_title_en', $page ? $page->menu_title_en : null), ['class'=>'form-control' . ($errors->has('menu_title_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('menu_title_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('menu_title_en') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_en', 'Description', ['class' => 'col-form-label']); !!}
                            <br>
                            {!! Form::textarea('description_en', old('description_en', $page ? $page->description_en : null),
                                ['class' => 'form-control' . $errors->has('description_en') ? ' is-invalid' : '', 'id' => 'description_en', 'rows' => 10]); !!}
                            @if ($errors->has('description_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('description_en') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('body_en', 'Body', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('body_en', old('body_en', $page ? $page->body_en : null),
                                ['class' => 'form-control' . $errors->has('body_en') ? ' is-invalid' : '', 'id' => 'body_en', 'rows' => 10]); !!}
                            @if ($errors->has('body_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('body_en') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('slug', 'Slug', ['class' => 'col-form-label']); !!}
                        {!! Form::text('slug', old('slug', $page ? $page->slug : null), ['class'=>'form-control' . ($errors->has('slug') ? ' is-invalid' : ''), 'required' => true]) !!}
                        @if ($errors->has('slug'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('slug') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('parent_id', trans('adminlte.pages.parent'), ['class' => 'col-form-label']); !!}
                        {!! Form::select('parent_id', $parents, old('parent_id', $page ? $page->parent_id : null),
                            ['class'=>'form-control' . ($errors->has('parent_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                        @if ($errors->has('parent_id'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('parent_id') }}</strong></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($page ? 'edit' : 'save')) }}</button>
</div>

@section($javaScriptSectionName)
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace('body_ru');
        CKEDITOR.replace('body_uz');
        CKEDITOR.replace('body_en');
        $('#parent_id').select2();
    </script>

@endsection
