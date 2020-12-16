@extends('layouts.app')

@section('body')
    <div class="h4-title pay-body">
        <h4 class="title">@lang('auth.registration')</h4>
    </div>
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="registration col-md-10">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">@lang('auth.username')</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email_or_phone"
                               class="col-md-4 col-form-label text-md-right">@lang('auth.email_or_phone')</label>
                        <div class="col-md-6 d-flex align-item-center">
                            <input id="email_or_phone"
                                   class="form-control @error('email_or_phone') is-invalid @enderror"
                                   name="email_or_phone" value="{{ old('email_or_phone') }}" required
                                   autocomplete="email_or_phone">
                            @error('email_or_phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password"
                               class="col-md-4 col-form-label text-md-right">@lang('auth.password')</label>
                        <div class="col-md-6">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password-confirm"
                               class="col-md-4 col-form-label text-md-right">@lang('auth.confirm_password')</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">@lang('auth.register')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
