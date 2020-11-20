@extends('layouts.app')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">@lang('auth.reset_password')</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email_or_phone" class="col-md-4 col-form-label text-md-right">
                                @if ($isPhone)
                                    @lang('auth.phone')
                                @else
                                    @lang('auth.email')
                                @endif
                            </label>

                            <div class="col-md-6">
                                <input id="email_or_phone" class="form-control @error('email_or_phone') is-invalid @enderror" name="email_or_phone" value="{{ $emailOrPhone ?? old('email_or_phone') }}" required disabled autocomplete="email_or_phone" autofocus>
                                <input type="hidden" name="email_or_phone" value="{{ $emailOrPhone }}">

                                @error('email_or_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @if ($isPhone)
                            <div class="form-group row">
                                <label for="email-or-phone-token" class="col-md-4 col-form-label text-md-right">@lang('auth.sms_code')</label>
                                <div class="col-md-6">
                                    <input id="email-or-phone-token" type="text" name="token" class="form-control @error('token') is-invalid @enderror" value="{{ old('token') }}" required>
                                </div>
                            </div>
                        @else
                            <input type="hidden" name="token" value="{{ $token }}" required>
                        @endif

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">@lang('auth.password')</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">@lang('auth.confirm_password')</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('auth.reset_password')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
