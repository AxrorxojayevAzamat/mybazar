@extends('layouts.page')

@section('content')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary mr-1">Edit</a>
        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">{{ trans('adminlte.delete') }}</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>Name</th><td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th><td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                @if ($user->status === \App\Entity\User\User::STATUS_WAIT)
                    <span class="badge badge-secondary">Waiting</span>
                @endif
                @if ($user->status === \App\Entity\User\User::STATUS_ACTIVE)
                    <span class="badge badge-primary">Active</span>
                @endif
            </td>
        </tr>
        <tbody>
        </tbody>
    </table>
@endsection
