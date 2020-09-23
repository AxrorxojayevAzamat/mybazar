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
                            {!! Form::label('title_uz', 'Nomi', ['class' => 'col-form-label']); !!}
                            {!! Form::text('title_uz', old('title_uz', $banner ? $banner->title_uz : null), ['class'=>'form-control' . ($errors->has('title_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('title_uz'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('title_uz') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_uz', 'Tavsifi', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('description_uz', old('description_uz', $banner ? $banner->description_uz : null),
                            ['class' => 'form-control' . $errors->has('description_uz') ? ' is-invalid' : '', 'id' => 'description_uz', 'rows' => 10]); !!}
                            @if ($errors->has('description_uz'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('description_uz') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="russian" role="tabpanel">
                        <div class="form-group">
                            {!! Form::label('title_ru', 'Название', ['class' => 'col-form-label']); !!}
                            {!! Form::text('title_ru', old('title_ru', $banner ? $banner->title_ru : null), ['class'=>'form-control' . ($errors->has('title_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('title_ru'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('title_ru') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_ru', 'Описание', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('description_ru', old('description_ru', $banner ? $banner->description_ru : null),
                            ['class' => 'form-control' . $errors->has('description_ru') ? ' is-invalid' : '', 'id' => 'description_ru', 'rows' => 10]); !!}
                            @if ($errors->has('description_ru'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('description_ru') }}</strong></span>
                            @endif
                        </div>                       
                    </div>
                    <div class="tab-pane" id="english" role="tabpanel">
                        <div class="form-group">
                            {!! Form::label('title_en', 'Name', ['class' => 'col-form-label']); !!}
                            {!! Form::text('title_en', old('title_en', $banner ? $banner->title_en : null), ['class'=>'form-control' . ($errors->has('title_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('title_en'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('title_en') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_en', 'Description', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('description_en', old('description_en', $banner ? $banner->description_en : null),
                            ['class' => 'form-control' . $errors->has('description_en') ? ' is-invalid' : '', 'id' => 'description_en', 'rows' => 10]); !!}
                            @if ($errors->has('description_en'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('description_en') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <!--tab-content-->

                <div class="col-md-10">
                    <div class="form-group">
                        {!! Form::label('url', 'Url', ['class' => 'col-form-label']); !!}
                        {!! Form::text('url', old('url', $banner ? $banner->url : null), ['class'=>'form-control' . ($errors->has('url') ? ' is-invalid' : ''), 'required' => true]) !!}
                        @if ($errors->has('url'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('url') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        {!! Form::label('slug', 'Slug', ['class' => 'col-form-label']); !!}
                        {!! Form::text('slug', old('slug', $banner ? $banner->slug : null), ['class'=>'form-control' . ($errors->has('slug') ? ' is-invalid' : ''), 'required' => true]) !!}
                        @if ($errors->has('slug'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('slug') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="form-group{{ $errors->has('is_published') ? ' has-error' : '' }}">
                        {!! Form::label('is_published', trans('adminlte.is_published'), ['class' => 'control-label']) !!}
                        {!! Form::select('is_published', [1 => 'On', 2 => 'Off'], old('is_published', $banner ? $banner->is_published : null),
                        ['class'=>'form-control' . ($errors->has('is_published') ? ' is-invalid' : ''), 'required' => true]) !!}

                        @if ($errors->has('is_published'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('is_published') }}</strong></span>
                        @endif
                    </div>
                </div>

            </div>
            <!--card-body-->


        </div>
        <!--card-->
    </div>
    <!--col-md-12-->
</div>
<!--row-->

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.image') }}</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <div class="file-loading">
                        <input id="file-input" class="file" type="file" name="file">
                    </div>
                    @if ($errors->has('file'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('file') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!--row2-->

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($banner ? 'edit' : 'save')) }}</button>
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

    let fileInput = $("#file-input");
    let fileUrl = null;

    if (fileUrl) {
        let send = XMLHttpRequest.prototype.send, token = $('meta[name="csrf-token"]').attr('content');
        XMLHttpRequest.prototype.send = function(data) {
            this.setRequestHeader('X-CSRF-Token', token);
            return send.apply(this, arguments);
        };

        fileInput.fileinput({
            initialPreview: [fileUrl],
            initialPreviewAsData: true,
            showUpload: false,
            previewFileType: 'text',
            browseOnZoneClick: true,
            overwriteInitial: true,
            deleteUrl: 'remove-file',
            maxFileCount: 1,
            allowedFileExtensions: ['jpg', 'jpeg', 'png'],
        });
    } else {
        fileInput.fileinput({
            showUpload: false,
            previewFileType: 'text',
            browseOnZoneClick: true,
            maxFileCount: 1,
            allowedFileExtensions: ['jpg', 'jpeg', 'png'],
        });
    }
</script>

@endsection
