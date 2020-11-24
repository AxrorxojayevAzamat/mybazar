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
                            <label for="name_uz" class="col-form-label">Nomi</label>
                            <input id="name_uz" class="form-control{{ $errors->has('name_uz') ? ' is-invalid' : '' }}"
                                   name="name_uz" value="{{ old('name_uz', $category ? $category->name_uz : null)}}" required>
                            @if ($errors->has('name_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_uz') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description_uz" class="col-form-label">Tavsifi</label>
                            <textarea id="description_uz" class="form-control{{ $errors->has('description_uz') ? ' is-invalid' : '' }}"
                                      name="description_uz" rows="10">{{ old('description_uz', $category ? $category->description_uz : null)}}</textarea>
                            @if ($errors->has('description_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('description_uz') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="russian" role="tabpanel">
                        <div class="form-group">
                            <label for="name_ru" class="col-form-label">Название</label>
                            <input id="name_ru" class="form-control{{ $errors->has('name_ru') ? ' is-invalid' : '' }}" name="name_ru" value="{{ old('name_ru', $category ? $category->name_ru : null) }}" required>
                            @if ($errors->has('name_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_ru') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description_ru" class="col-form-label">Описание</label>
                            <textarea id="description_ru" class="form-control{{ $errors->has('description_ru') ? ' is-invalid' : '' }}"
                                      name="description_ru" rows="10">{{ old('description_ru', $category ? $category->description_ru : null)}}</textarea>
                            @if ($errors->has('description_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('description_ru') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="english" role="tabpanel">
                        <div class="form-group">
                            <label for="name_en" class="col-form-label">Name</label>
                            <input id="name_en" class="form-control{{ $errors->has('name_en') ? ' is-invalid' : '' }}" name="name_en" value="{{ old('name_en', $category ? $category->name_en : null) }}" required>
                            @if ($errors->has('name_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_en') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description_en" class="col-form-label">Description</label>
                            <textarea id="description_en" class="form-control{{ $errors->has('description_en') ? ' is-invalid' : '' }}"
                                      name="description_en" rows="10">{{ old('description_en', $category ? $category->description_en : null)}}</textarea>
                            @if ($errors->has('description_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('description_en') }}</strong></span>
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
            <div class="card-body">
                <div class="form-group">
                    <label for="slug" class="col-form-label">Slug</label>
                    <input id="slug" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug', $category ? $category->slug : null) }}" required>
                    @if ($errors->has('slug'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('slug') }}</strong></span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('brands', trans('adminlte.brand.name'), ['class' => 'col-form-label']); !!}
                    {!! Form::select('brands[]', $brands, old('brands', $category ? $category->brandsList() : null),
                        ['multiple' => true, 'class'=>'form-control' . ($errors->has('brands') ? ' is-invalid' : ''), 'id' => 'brands']) !!}
                    @if ($errors->has('brands'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('brands') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-default card-outline">
            <div class="card-body">
                <div class="form-group">
                    <label for="parent" class="col-form-label">{{ trans('adminlte.parent') }}</label>
                    <select id="parent" class="form-control{{ $errors->has('parent') ? ' is-invalid' : '' }}" name="parent">
                        <option value=""></option>
                        @foreach ($parents as $parent)
                            <option value="{{ $parent->id }}"{{ $parent->id == old('parent', $category ? $category->parent_id : null) ? ' selected' : '' }}>
                                @for ($i = 0; $i < $parent->depth; $i++) &mdash; @endfor
                                {{ $parent->name }}
                            </option>
                        @endforeach;
                    </select>
                    @if ($errors->has('parent'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('parent') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="photo-input" class="col-form-label">@lang('adminlte.photo.name')</label>
                            <div class="file-loading">
                                <input id="photo-input" class="file" type="file" name="photo">
                            </div>
                            @if ($errors->has('photo'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('photo') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="icon-input" class="col-form-label">@lang('adminlte.icon')</label>
                            <div class="file-loading">
                                <input id="icon-input" class="file" type="file" name="icon">
                            </div>
                            @if ($errors->has('icon'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('icon') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($category ? 'edit' : 'save')) }}</button>
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
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description_uz');
        CKEDITOR.replace('description_ru');
        CKEDITOR.replace('description_en');
        $('#brands').select2();
        $('#parent').select2();

        let photoInput = $("#photo-input");
        let iconInput = $("#icon-input");
        let photoUrl = '{{ $category ? ($category->photo ? $category->photoOriginal : null) : null }}';
        let iconUrl = '{{ $category ? ($category->icon ? $category->iconOriginal : null) : null }}';

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

        if (iconUrl) {
            iconInput.fileinput({
                initialPreview: [iconUrl],
                initialPreviewAsData: true,
                showUpload: false,
                previewFileType: 'text',
                browseOnZoneClick: true,
                overwriteInitial: true,
                deleteUrl: 'remove-icon',
                maxFileCount: 1,
                allowedFileExtensions: ['jpg', 'jpeg', 'png'],
            });
        } else {
            iconInput.fileinput({
                showUpload: false,
                previewFileType: 'text',
                browseOnZoneClick: true,
                maxFileCount: 1,
                allowedFileExtensions: ['jpg', 'jpeg', 'png'],
            });
        }
    </script>
@endsection
