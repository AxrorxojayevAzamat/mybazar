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


                <div class="col-md-10">
                    <div class="form-group">
                        {!! Form::label('url', trans('adminlte.url'), ['class' => 'col-form-label']); !!}
                        {!! Form::text('url', old('url', $slider ? $slider->url : null), ['class'=>'form-control' . ($errors->has('url') ? ' is-invalid' : ''), 'required' => true]) !!}
                        @if ($errors->has('url'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('url') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        {!! Form::label('sort', trans('adminlte.sliders.sort'), ['class' => 'col-form-label']); !!}
                        {!! Form::number('sort', old('sort', $slider ? $slider->sort : null), ['class'=>'form-control' . ($errors->has('sort') ? ' is-invalid' : ''), 'required' => true]) !!}
                        @if ($errors->has('sort'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('sort') }}</strong></span>
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
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($slider ? 'edit' : 'save')) }}</button>
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
