@extends('layouts.page')

@section('content')

    <p><a href="{{ route('admin.users.create') }}" class="btn btn-success">{{ trans('adminlte.user.add') }}</a></p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>{{ trans('adminlte.username') }}</th>
            <th>{{ trans('adminlte.email') }}</th>
            <th>{{ trans('adminlte.status') }}</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><a href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
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
