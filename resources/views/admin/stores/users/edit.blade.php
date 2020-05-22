@extends('layouts.page')

@section('content')

    <form method="POST" action="{{ route('admin.stores.users.update', ['store' => $store, 'user' => $user]) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('name', trans('adminlte.user.name'), ['class' => 'col-form-label']); !!}
                            {!! Form::text('name', old('name', $user->name), ['class'=>'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', trans('adminlte.user.email'), ['class' => 'col-form-label']); !!}
                            {!! Form::email('email', old('email', $user->email), ['class'=>'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('email'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('role', trans('adminlte.user.role'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('role', $roles, old('role', $user->role), ['class'=>'form-control' . ($errors->has('role') ? ' is-invalid' : '')]) !!}
                            @if ($errors->has('role'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('role') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', trans('adminlte.status'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('status', $statuses, old('role', $user->status), ['class'=>'form-control' . ($errors->has('status') ? ' is-invalid' : '')]) !!}
                            @if ($errors->has('status'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('status') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', trans('adminlte.password'), ['class' => 'col-form-label']); !!}
                            {!! Form::password('password', ['class'=>'form-control']) !!}
                            @if ($errors->has('password'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ trans('adminlte.edit') }}</button>
        </div>
    </form>
@endsection
