@extends('layouts.app')

@section('title', 'User Phone Confirm')

@section('css')
<link rel="stylesheet" href="{{ mix('css/fileinput.css', 'build') }}">
@endsection

@section('body')
<!-- body -->

<div class="row">
    <div class="col-md-12">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.index') }}">
                @csrf
                @method('PUT')
               
                @if(config('sms.send_local'))
                <label>[TEST MODE] code: {{Auth::user()->phone_verify_token}}</label>
                @endif

                <div class="form-group">
                    <label for="token" class="col-form-label">SMS Code</label>
                    <input id="token" class="form-control{{ $errors->has('token') ? ' is-invalid' : '' }}" name="token" value="{{ old('token') }}" required>
                    @if ($errors->has('token'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('token') }}</strong></span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Verify</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection