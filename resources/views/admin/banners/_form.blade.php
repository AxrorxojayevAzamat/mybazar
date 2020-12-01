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
                    <div class="form-group">
                        {!! Form::label('category_id', trans('adminlte.category.name'), ['class' => 'col-form-label']); !!}
                        {!! Form::select('category_id', $categories, old('category_id', $banner ? $banner->category_id : null),
                        ['class'=>'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => '', 'required' => true]) !!}
                        @if ($errors->has('category_id'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('category_id') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        {!! Form::label('status', trans('adminlte.status'), ['class' => 'control-label']) !!}
                        {!! Form::select('status', \App\Entity\Banner::statusList(), old('status', $banner ? $banner->status : null),
                        ['class'=>'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'required' => true]) !!}
                        @if ($errors->has('status'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('status') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                        {!! Form::label('type', trans('adminlte.type'), ['class' => 'control-label']) !!}
                        {!! Form::select('type', \App\Entity\Banner::typeList(), old('type', $banner ? $banner->type : null),
                        ['class'=>'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'required' => true]) !!}
                        @if ($errors->has('type'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('type') }}</strong></span>
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
        <div class="card card-gray card-outline">
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
    CKEDITOR.replace('description_uz');
    CKEDITOR.replace('description_ru');
    CKEDITOR.replace('description_en');
    $('#category_id').select2();

    let fileInput = $("#file-input");
    let fileUrl = '{{ $banner ? ($banner->file ? $banner->fileOriginal : null) : null }}';

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
