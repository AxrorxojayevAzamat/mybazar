@extends('layouts.page')

@section('content')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.stores.users.edit', ['store' => $store, 'user' => $user]) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>
        <form method="POST" action="{{ route('admin.stores.users.destroy', ['store' => $store, 'user' => $user]) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">{{ trans('adminlte.delete') }}</button>
        </form>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <th>ID</th><td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.user.name') }}</th><td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.email') }}</th><td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.user.role') }}</th><td>{{ $storeWorker->roleName() }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.status') }}</th>
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
                </div>
            </div>
        </div>
    </div>

@endsection
