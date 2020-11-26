@extends('layouts.app')

@section('title', trans('frontend.profile'))

@section('breadcrumbs','')


@section('body')
    <!-- body -->
    <div class="container">
        <form method="POST" action="{{ route('profile.add-phone') }}">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-header">@lang('auth.phone')</div>
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::label('phone', trans('adminlte.phone') , ['class' => 'col-form-label']); !!}
                                {!! Form::text('phone', old('phone'), ['class'=>'form-control' . ($errors->has('phone') ? ' is-invalid' : '')]) !!}

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('phone') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('auth.add_phone')</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>

@endsection
