@section('mix_adminlte_css')
    <link rel="stylesheet" href="{{ mix('css/fileinput.css', 'build') }}">
@endsection
<div class="form-group">
    <label for="name_uz" class="col-form-label">Nomi</label>
    <input id="name_uz" class="form-control{{ $errors->has('name_uz') ? ' is-invalid' : '' }}"
           name="name_uz" value="{{ old('name_uz', $brand ? $brand->name_uz : null)}}" required>
    @if ($errors->has('name_uz'))
        <span class="invalid-feedback"><strong>{{ $errors->first('name_uz') }}</strong></span>
    @endif
</div>

<div class="form-group">
    <label for="name_ru" class="col-form-label">Название</label>
    <input id="name_ru" class="form-control{{ $errors->has('name_ru') ? ' is-invalid' : '' }}" name="name_ru" value="{{ old('name_ru', $brand ? $brand->name_ru : null) }}" required>
    @if ($errors->has('name_ru'))
        <span class="invalid-feedback"><strong>{{ $errors->first('name_ru') }}</strong></span>
    @endif
</div>

<div class="form-group">
    <label for="name_en" class="col-form-label">Name</label>
    <input id="name_en" class="form-control{{ $errors->has('name_en') ? ' is-invalid' : '' }}" name="name_en" value="{{ old('name_en', $brand ? $brand->name_en : null) }}" required>
    @if ($errors->has('name_en'))
        <span class="invalid-feedback"><strong>{{ $errors->first('name_en') }}</strong></span>
    @endif
</div>

<div class="form-group">
    <label for="slug" class="col-form-label">Slug</label>
    <input id="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug', $brand ? $brand->slug : null) }}"
           required>
    @if ($errors->has('slug'))
        <span class="invalid-feedback"><strong>{{ $errors->first('slug') }}</strong></span>
    @endif
</div>

<div class="form-group">
    <label for="logo" class="col-form-label">Logo</label>
    <div class="file-loading">
        <input id="file-input" class="file" type="file" name="logo">
    </div>
    @if ($errors->has('logo'))
        <span class="invalid-feedback"><strong>{{ $errors->first('logo') }}</strong></span>
    @endif
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($brand ? 'edit' : 'save')) }}</button>
</div>

@section('mix_adminlte_js')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>

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
        let logoUrl = '{{ $brand->logo ? $brand->logoOriginal : null }}';

        $('#lfm').filemanager('image');

        if (logoUrl) {
            let send = XMLHttpRequest.prototype.send, token = $('meta[name="csrf-token"]').attr('content');
            XMLHttpRequest.prototype.send = function(data) {
                this.setRequestHeader('X-CSRF-Token', token);
                return send.apply(this, arguments);
            };

            fileInput.fileinput({
                initialPreview: [logoUrl],
                initialPreviewAsData: true,
                showUpload: false,
                previewFileType: 'text',
                browseOnZoneClick: true,
                overwriteInitial: true,
                deleteUrl: '{{ 'remove-logo' }}',
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
