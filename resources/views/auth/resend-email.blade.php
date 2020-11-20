@extends('layouts.app')

@section('body')

    <form class="d-inline" method="POST" action="{{ route('resend.email.verification') }}">
        @csrf
        <div class="form-group">
            <label for="email" class="col-form-label">@lang('auth.email')</label>
            <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">@lang('auth.resend')</button>
        </div>
    </form>
@endsection
