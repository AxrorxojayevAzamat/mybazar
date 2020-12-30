@extends('layouts.app')

@section('title', trans('frontend.profile'))

@section('breadcrumbs','')


@section('body')
    <!-- body -->
    <div class="container">
        <form method="POST" action="{{ route('profile.add-email') }}">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-header">@lang('auth.email')</div>
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::label('email', trans('adminlte.email') , ['class' => 'col-form-label']); !!}
                                {!! Form::email('email', old('email'), ['class'=>'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) !!}

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('auth.add_email')</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

