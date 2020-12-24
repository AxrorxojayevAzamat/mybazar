@extends('layouts.app')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('auth.verify_your_email')</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            @lang('auth.email_link_sent')
                        </div>
                    @endif

                    @lang('auth.check_your_email')
                    @if (Auth::guest())
                        @lang('auth.if_email_link_not_received')
                        <form class="d-inline" method="POST" action="{{ route('resend.email.verification') }}">
                            @csrf
                            <div class="form-group">
                                <input id="email" type="hidden" class="form-control" name="email" value="{{ $email }}" required>
                            </div>
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">@lang('auth.click_to_receive_another')</button>.
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
@endsection
