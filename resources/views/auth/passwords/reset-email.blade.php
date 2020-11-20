@extends('layouts.app')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('auth.reset_password_email')</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                @lang('auth.email_link_sent')
                            </div>
                        @endif

                        @lang('auth.check_your_email')
                        @lang('auth.if_email_link_not_received')
                        <form class="d-inline" method="POST" action="{{ route('password.reset.request') }}">
                            @csrf
                            <div class="form-group">
                                <input id="email" type="hidden" class="form-control" name="email_or_phone" value="{{ $email }}" required>
                            </div>
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">@lang('auth.click_to_receive_another')</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
