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
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="uzbek" role="tabpanel">
                        <div class="form-group">
                            {!! Form::label('title_uz', 'Nomi', ['class' => 'col-form-label']); !!}
                            {!! Form::text('title_uz', old('title_uz', $video ? $video->title_uz : null), ['class'=>'form-control' . ($errors->has('title_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('title_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('title_uz') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_uz', 'Tavsifi', ['class' => 'col-form-label']); !!}
                            <br>
                            {!! Form::textarea('description_uz', old('description_uz', $video ? $video->description_uz : null),
                                ['class' => 'form-control' . $errors->has('description_uz') ? ' is-invalid' : '', 'id' => 'description_uz', 'rows' => 10]); !!}
                            @if ($errors->has('description_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('description_uz') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('body_uz', 'Asosiy qismi', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('body_uz', old('body_uz', $video ? $video->body_uz : null),
                                ['class' => 'form-control' . $errors->has('body_uz') ? ' is-invalid' : '', 'id' => 'body_uz', 'rows' => 10]); !!}
                            @if ($errors->has('body_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('body_uz') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="russian" role="tabpanel">
                        <div class="form-group">
                            {!! Form::label('title_ru', 'Название', ['class' => 'col-form-label']); !!}
                            {!! Form::text('title_ru', old('title_ru', $video ? $video->title_ru : null), ['class'=>'form-control' . ($errors->has('title_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('title_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('title_ru') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_ru', 'Описание', ['class' => 'col-form-label']); !!}
                            <br>
                            {!! Form::textarea('description_ru', old('description_ru', $video ? $video->description_ru : null),
                                ['class' => 'form-control' . $errors->has('description_ru') ? ' is-invalid' : '', 'id' => 'description_ru', 'rows' => 10]); !!}
                            @if ($errors->has('description_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('description_ru') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('body_ru', 'Основная часть', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('body_ru', old('body_ru', $video ? $video->body_ru : null),
                                ['class' => 'form-control' . $errors->has('body_ru') ? ' is-invalid' : '', 'id' => 'body_ru', 'rows' => 10]); !!}
                            @if ($errors->has('body_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('body_ru') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="english" role="tabpanel">
                        <div class="form-group">
                            {!! Form::label('title_en', 'Name', ['class' => 'col-form-label']); !!}
                            {!! Form::text('title_en', old('title_en', $video ? $video->title_en : null), ['class'=>'form-control' . ($errors->has('title_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('title_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('title_en') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_en', 'Description', ['class' => 'col-form-label']); !!}
                            <br>
                            {!! Form::textarea('description_en', old('description_en', $video ? $video->description_en : null),
                                ['class' => 'form-control' . $errors->has('description_en') ? ' is-invalid' : '', 'id' => 'description_en', 'rows' => 10]); !!}
                            @if ($errors->has('description_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('description_en') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('body_en', 'Body', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('body_en', old('body_en', $video ? $video->body_en : null),
                                ['class' => 'form-control' . $errors->has('body_en') ? ' is-invalid' : '', 'id' => 'body_en', 'rows' => 10]); !!}
                            @if ($errors->has('body_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('body_en') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="form-group">
                        {!! Form::label('category_id', trans('adminlte.category.name'), ['class' => 'col-form-label']); !!}
                        {!! Form::select('category_id', $categories, old('category_id', $video ? $video->category_id : null),
                            ['class'=>'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'required' => true]) !!}
                        @if ($errors->has('category_id'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('category_id') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        {!! Form::label('status', trans('adminlte.status'), ['class' => 'control-label']) !!}
                        {!! Form::select('status', \App\Entity\Banner::statusList(), old('status', $video ? $video->status : null),
                        ['class'=>'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'required' => true]) !!}
                        @if ($errors->has('status'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('status') }}</strong></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.files') }}</h3></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('poster', trans('adminlte.poster'), ['class' => 'control-label']) !!}
                            <div class="file-loading">
                                <input id="poster-input" class="file" type="file" name="poster" accept=".jpg,.jpeg.png">
                            </div>
                            @if ($errors->has('poster'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('poster') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('video', trans('adminlte.video'), ['class' => 'control-label']) !!}
                            <div class="file-loading">
                                <input id="video-input" class="file" type="file" name="video">
                            </div>
                            @if ($errors->has('video'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('video') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($video ? 'edit' : 'save')) }}</button>
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
        $('#category_id').select2();

        let posterInput = $("#poster-input");
        let posterUrl = '{{ $video ? ($video->poster ? $video->posterOriginal : null) : null }}';

        let videoInput = $("#video-input");
        let videoUrl = '{{ $video ? ($video->video ? $video->videoFile : null) : null }}';

        let send = XMLHttpRequest.prototype.send, token = $('meta[name="csrf-token"]').attr('content');
        XMLHttpRequest.prototype.send = function(data) {
            this.setRequestHeader('X-CSRF-Token', token);
            return send.apply(this, arguments);
        };

        if (posterUrl) {
            posterInput.fileinput({
                initialPreview: [posterUrl],
                initialPreviewAsData: true,
                showUpload: false,
                previewFileType: 'text',
                browseOnZoneClick: true,
                overwriteInitial: true,
                deleteUrl: 'remove-poster',
                maxFileCount: 1,
                allowedFileExtensions: ['jpg', 'jpeg', 'png'],
            });
        } else {
            posterInput.fileinput({
                showUpload: false,
                previewFileType: 'text',
                browseOnZoneClick: true,
                maxFileCount: 1,
                allowedFileExtensions: ['jpg', 'jpeg', 'png'],
            });
        }

        if (videoUrl) {
            videoInput.fileinput({
                initialPreview: [videoUrl],
                initialPreviewAsData: true,
                showUpload: false,
                previewFileType: 'text',
                browseOnZoneClick: true,
                overwriteInitial: true,
                deleteUrl: 'remove-video',
                maxFileCount: 1,
                allowedFileTypes: ['video'],
                allowedFileExtensions: ['mp4'],
            });
        } else {
            videoInput.fileinput({
                showUpload: false,
                previewFileType: 'text',
                browseOnZoneClick: true,
                maxFileCount: 1,
                allowedFileTypes: ['video'],
                allowedFileExtensions: ['mp4'],
            });
        }
    </script>

@endsection
