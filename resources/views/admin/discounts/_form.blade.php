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
                            {!! Form::text('name_uz', old('name_uz', $discount ? $discount->name_uz : null), ['class'=>'form-control' . ($errors->has('name_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_uz') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_uz', 'Tavsifi', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('description_uz', old('description_uz', $discount ? $discount->description_uz : null),
                                ['class' => 'form-control' . $errors->has('description_uz') ? ' is-invalid' : '', 'id' => 'description_uz', 'rows' => 10]); !!}
                            @if ($errors->has('description_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('description_uz') }}</strong></span>
                            @endif
                        </div>                        
                    </div>
                    <div class="tab-pane" id="russian" role="tabpanel">
                        <div class="form-group">
                            {!! Form::label('name_ru', 'Название', ['class' => 'col-form-label']); !!}
                            {!! Form::text('name_ru', old('name_ru', $discount ? $discount->name_ru : null), ['class'=>'form-control' . ($errors->has('name_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_ru') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_ru', 'Описание', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('description_ru', old('description_ru', $discount ? $discount->description_ru : null),
                                ['class' => 'form-control' . $errors->has('description_ru') ? ' is-invalid' : '', 'id' => 'description_ru', 'rows' => 10]); !!}
                            @if ($errors->has('description_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('description_ru') }}</strong></span>
                            @endif
                        </div>                        
                    </div>
                    <div class="tab-pane" id="english" role="tabpanel">
                        <div class="form-group">
                            {!! Form::label('name_en', 'Name', ['class' => 'col-form-label']); !!}
                            {!! Form::text('name_en', old('name_en', $discount ? $discount->name_en : null), ['class'=>'form-control' . ($errors->has('name_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_en') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_en', 'Description', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('description_en', old('description_en', $discount ? $discount->description_en : null),
                                ['class' => 'form-control' . $errors->has('description_en') ? ' is-invalid' : '', 'id' => 'description_en', 'rows' => 10]); !!}
                            @if ($errors->has('description_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('description_en') }}</strong></span>
                            @endif
                        </div>                        
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="form-group">
                        {!! Form::label('category_id', trans('adminlte.category.name'), ['class' => 'col-form-label']); !!}
                        {!! Form::select('category_id', $categories, old('category_id', $discount ? $discount->category_id : null),
                            ['class'=>'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'required' => true]) !!}
                        @if ($errors->has('category_id'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('category_id') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="form-group{{ $errors->has('common') ? ' has-error' : '' }}">
                        {!! Form::label('common', trans('adminlte.common'), ['class' => 'control-label']) !!}
                        {!! Form::select('common', [1 => 'On', 2 => 'Off'], old('common', $discount ? $discount->common : null),
                            ['class'=>'form-control' . ($errors->has('common') ? ' is-invalid' : ''), 'required' => true]) !!}

                        @if ($errors->has('common'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('common') }}</strong></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.files') }}</h3></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('photo', trans('adminlte.photo'), ['class' => 'control-label']) !!}
                            <div class="file-loading">
                                <input id="photo-input" class="file" type="file" name="photo" accept=".jpg,.jpeg.png">
                            </div>
                            @if ($errors->has('photo'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('photo') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@section($javaScriptSectionName)
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/piexif.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/purify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/themes/fa/theme.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/locales/uz.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/locales/ru.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/locales/LANG.js') }}"></script>
    {{--    <script src="{{ mix('js/fileinput.js', 'build') }}"></script>--}}

    <script>
        CKEDITOR.replace('body_ru');
        CKEDITOR.replace('body_uz');
        CKEDITOR.replace('body_en');

        let photoInput = $("#photo-input");
        let photoUrl = '{{ $discount ? ($discount->photo ? $discount->photoOriginal : null) : null }}';


        let send = XMLHttpRequest.prototype.send, token = $('meta[name="csrf-token"]').attr('content');
        XMLHttpRequest.prototype.send = function(data) {
            this.setRequestHeader('X-CSRF-Token', token);
            return send.apply(this, arguments);
        };

        if (photoUrl) {
            photoInput.fileinput({
                initialPreview: [photoUrl],
                initialPreviewAsData: true,
                showUpload: false,
                previewFileType: 'text',
                browseOnZoneClick: true,
                overwriteInitial: true,
                deleteUrl: 'remove-photo',
                maxFileCount: 1,
                allowedFileExtensions: ['jpg', 'jpeg', 'png'],
            });
        } else {
            photoInput.fileinput({
                showUpload: false,
                previewFileType: 'text',
                browseOnZoneClick: true,
                maxFileCount: 1,
                allowedFileExtensions: ['jpg', 'jpeg', 'png'],
            });
        }
       
    </script>

@endsection
