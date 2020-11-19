@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('resend.phone.show') }}">
        @csrf
        <div class="form-group">
            <label for="phone" class="col-form-label">@lang('auth.phone')</label>
            <input id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
            @if ($errors->has('phone'))
                <span class="invalid-feedback"><strong>{{ $errors->first('phone') }}</strong></span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">@lang('auth.resend')</button>
        </div>
    </form>
@endsection
