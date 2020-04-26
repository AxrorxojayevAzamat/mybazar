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

<div class="form-group">
    <label for="slug" class="col-form-label">Slug</label>
    <input id="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug', $category ? $category->slug : null) }}"
           required>
    @if ($errors->has('slug'))
        <span class="invalid-feedback"><strong>{{ $errors->first('slug') }}</strong></span>
    @endif
</div>

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

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($category ? 'edit' : 'save')) }}</button>
</div>

@section('mix_adminlte_js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/select2/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description_uz');
        CKEDITOR.replace('description_ru');
        CKEDITOR.replace('description_en');
        $('#parent').select2();
    </script>
@endsection
