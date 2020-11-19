@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('verify.phone') }}">
        @csrf
        <div class="form-group">
            <input id="phone" type="hidden" class="form-control" name="token" value="{{ old('token') }}" required>
        </div>
        <div class="form-group">
            <label for="token" class="col-form-label">@lang('auth.sms_code')</label>
            <input id="token" class="form-control{{ $errors->has('token') ? ' is-invalid' : '' }}" name="token" value="{{ old('token') }}" required>
            @if ($errors->has('token'))
                <span class="invalid-feedback"><strong>{{ $errors->first('token') }}</strong></span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">@lang('auth.verify')</button>
        </div>
    </form>
@endsection
