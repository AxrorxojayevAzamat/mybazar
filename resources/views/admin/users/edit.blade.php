@extends('layouts.page')

@section('content')

    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">{{ trans('adminlte.user.name') }}</label>
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
                            <label for="role" class="col-form-label">{{ trans('adminlte.user.role') }}</label>
                            <select id="role" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="role">
                                @foreach ($roles as $value => $label)
                                    <option value="{{ $value }}"{{ $value === old('role', $user->role) ? ' selected' : '' }}>{{ $label }}</option>
                                @endforeach;
                            </select>
                            @if ($errors->has('role'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('role') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-form-label">{{ trans('adminlte.status') }}</label>
                            <select id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status">
                                @foreach ($statuses as $value => $label)
                                    <option value="{{ $value }}"{{ $value === old('status', $user->status) ? ' selected' : '' }}>{{ $label }}</option>
                                @endforeach;
                            </select>
                            @if ($errors->has('status'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('status') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ trans('adminlte.password') }}</label>
                            <input id="password" type="password" class="form-control" name="password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ trans('adminlte.edit') }}</button>
        </div>
    </form>
@endsection
