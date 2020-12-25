@extends('layouts.app')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">@lang('auth.phone_verification')</div>
                    <div class="card-body">The password
                        <form method="POST" action="{{ isset($user) && $user->exists ? route('profile.verify.phone') : route('verify.phone') }}">
                            @csrf
                            <div class="form-group">
                                <input id="phone" type="hidden" class="form-control" name="phone" value="{{ $phone }}" required>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
@endsection
