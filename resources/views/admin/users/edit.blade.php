@extends('layouts.page')

@section('content')

    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="col-form-label">{{ trans('adminlte.username') }}</label>
            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="email" class="col-form-label">{{ trans('adminlte.email') }}</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $user->email) }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="status" class="col-form-label">{{ trans('adminlte.status') }}</label>
            <select id="status" type="email" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status">
                @foreach ($statuses as $value => $label)
                    <option value="{{ $value }}"{{ $value === old('status', $user->status) ? ' selected' : '' }}>{{ $label }}</option>
                @endforeach;
            </select>
            @if ($errors->has('email'))
                <span class="invalid-feedback"><strong>{{ $errors->first('status') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ trans('adminlte.edit') }}</button>
        </div>
    </form>
@endsection
