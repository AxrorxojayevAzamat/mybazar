@if (!config('adminlte.enabled_laravel_mix'))
    @php($cssSectionName = 'css')
    @php($javaScriptSectionName = 'js')
@else
    @php($cssSectionName = 'mix_adminlte_css')
    @php($javaScriptSectionName = 'mix_adminlte_js')
@endif

@section($cssSectionName)
    <link rel="stylesheet" href="{{ mix('css/fileinput.css', 'build') }}">
    <link rel="stylesheet" href="{{ mix('css/colorpicker.css', 'build') }}">
@endsection

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.main') }}</h3></div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('name_uz', 'Nomi', ['class' => 'col-form-label']); !!}
                    {!! Form::text('name_uz', old('name_uz', $modification ? $modification->name_uz : null), ['class'=>'form-control' . ($errors->has('name_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
                    @if ($errors->has('name_uz'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('name_uz') }}</strong></span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('name_ru', 'Название', ['class' => 'col-form-label']); !!}
                    {!! Form::text('name_ru', old('name_ru', $modification ? $modification->name_ru : null), ['class'=>'form-control' . ($errors->has('name_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
                    @if ($errors->has('name_ru'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('name_ru') }}</strong></span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('name_en', 'Name', ['class' => 'col-form-label']); !!}
                    {!! Form::text('name_en', old('name_en', $modification ? $modification->name_en : null), ['class'=>'form-control' . ($errors->has('name_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                    @if ($errors->has('name_en'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('name_en') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-green card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('code', trans('adminlte.code'), ['class' => 'col-form-label']); !!}
                            {!! Form::text('code', old('discount', $modification ? $modification->code : null),
                                    ['class'=>'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'maxlength' => 20]) !!}
                            @if ($errors->has('code'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('code') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('price_uzs', trans('adminlte.price_uzs'), ['class' => 'col-form-label']); !!}
                            {!! Form::number('price_uzs', old('price_uzs', $modification ? $modification->price_uzs : null),
                                    ['class'=>'form-control' . ($errors->has('price_uzs') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('price_uzs'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('price_uzs') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('price_usd', trans('adminlte.price_usd'), ['class' => 'col-form-label']); !!}
                            {!! Form::number('price_usd', old('price_usd', $modification ? $modification->price_usd : null),
                                    ['class'=>'form-control' . ($errors->has('price_usd') ? ' is-invalid' : ''), 'step' => '0.01']) !!}
                            @if ($errors->has('price_usd'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('price_usd') }}</strong></span>
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
        <div class="card card-danger card-outline">
            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.value.name') }}</h3></div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::text('value', old('value', $modification ? $modification->value : null), ['class'=>'form-control' . ($errors->has('value') ? ' is-invalid' : ''), 'required' => true]) !!}
                    @if ($errors->has('value'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('value') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-warning card-outline">
            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.color') }}</h3></div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::text('color', old('color', $modification ? $modification->color : null), ['class' => 'form-control' . ($errors->has('color') ? ' is-invalid' : ''), 'id' => 'color']) !!}
                    @if ($errors->has('color'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('color') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.photo.name') }}</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <div class="file-loading">
                        <input id="file-input" class="file" type="file" name="photo">
                    </div>
                    @if ($errors->has('photo'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('photo') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($modification ? 'edit' : 'save')) }}</button>
</div>

@section($javaScriptSectionName)
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/piexif.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/purify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/themes/fa/theme.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/locales/uz.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/locales/ru.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/locales/LANG.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
{{--    <script src="{{ mix('js/colorpicker.js', 'build') }}"></script>--}}
{{--    <script src="{{ mix('js/fileinput.js', 'build') }}"></script>--}}

    <script>
        $('#color').colorpicker({});

        let fileInput = $("#file-input");
        let logoUrl = '{{ $modification ? ($modification->photo ? $modification->photoOriginal : null) : null }}';

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
                deleteUrl: 'remove-photo',
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
