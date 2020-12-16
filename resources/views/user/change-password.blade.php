@extends('layouts.app')

@section('title', trans('frontend.profile'))

@section('breadcrumbs','')


@section('body')
    <!-- body -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="margin-bottom: 20px;">
                    <div class="card-header">@lang('menu.change_password')</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.change-password') }}">
                            @csrf
                            <div class="form-group">
                                {!! Form::label('current_password', trans('frontend.current_password') , ['class' => 'col-form-label']); !!}
                                {!! Form::password('current_password', ['id' => 'currentPassword','class'=>'form-control' . ($errors->has('current_password') ? ' is-invalid' : ''), 'required' => true]) !!}
                                @if ($errors->has('current_password'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('current_password') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('new_password', trans('frontend.new_password') , ['class' => 'col-form-label']); !!}
                                {!! Form::password('new_password', ['id' => 'newPassword','class'=>'form-control' . ($errors->has('new_password') ? ' is-invalid' : ''), 'required' => true]) !!}
                                @if ($errors->has('new_password'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('new_password') }}</strong></span>
                                @endif
                            </div>
                            <button id="change-password" type="submit" class="btn btn-sm btn-success">@lang('menu.change_password')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
    @include('user._script')
@endsection
