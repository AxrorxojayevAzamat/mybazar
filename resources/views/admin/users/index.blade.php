@extends('layouts.page')

@section('content')

    <p><a href="{{ route('admin.users.create') }}" class="btn btn-success">{{ trans('adminlte.user.add') }}</a></p>

    <div class="card mb-3">
{{--        <div class="card-header">Filter</div>--}}
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                            {!! Form::text('id', request('id'), ['class'=>'form-control', 'placeholder' => 'ID']) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            {!! Form::text('name', request('name'), ['class'=>'form-control', 'placeholder' => trans('adminlte.name')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            {!! Form::text('email', request('email'), ['class'=>'form-control', 'placeholder' => trans('adminlte.email')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            {!! Form::select('status', $statuses, request('status'), ['class'=>'form-control', 'placeholder' => trans('adminlte.status')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            {!! Form::select('role', $roles, request('role'), ['class'=>'form-control', 'placeholder' => trans('adminlte.user.role')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ trans('adminlte.search') }}</button>
                            <a href="?" class="btn btn-outline-secondary">{{ trans('adminlte.clear') }}</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>{{ trans('adminlte.user.name') }}</th>
            <th>{{ trans('adminlte.email') }}</th>
            <th>{{ trans('adminlte.user.role') }}</th>
            <th>{{ trans('adminlte.status') }}</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><a href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->roleName() }}</td>
                <td>
                    @if ($user->status === \App\Entity\User\User::STATUS_WAIT)
                        <span class="badge badge-secondary">{{ trans('adminlte.user.waiting') }}</span>
                    @endif
                    @if ($user->status === \App\Entity\User\User::STATUS_ACTIVE)
                        <span class="badge badge-primary">{{ trans('adminlte.user.active') }}</span>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $users->links() }}
@endsection
