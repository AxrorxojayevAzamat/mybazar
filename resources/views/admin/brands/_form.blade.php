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
    <input id="logo" type="file" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" name="logo" required>
    @if ($errors->has('logo'))
        <span class="invalid-feedback"><strong>{{ $errors->first('logo') }}</strong></span>
    @endif
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($brand ? 'edit' : 'save')) }}</button>
</div>
