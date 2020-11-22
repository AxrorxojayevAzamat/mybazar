@extends('layouts.admin.page')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.shop.characteristic-groups.edit', $group) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>

        <form method="POST" action="{{ route('admin.shop.characteristic-groups.destroy', $group) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">{{ trans('adminlte.delete') }}</button>
        </form>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
{{--                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.main') }}</h3></div>--}}
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr><th>ID</th><td>{{ $group->id }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Uz</th><td>{{ $group->name_uz }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Ru</th><td>{{ $group->name_ru }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} En</th><td>{{ $group->name_en }}</td></tr>
                        <tr><th>{{ trans('adminlte.order') }} En</th><td>{{ $group->order }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.other') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr><th>{{ trans('adminlte.created_by') }}</th><td>{{ $group->createdBy->name }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_by') }}</th><td>{{ $group->updatedBy->name }}</td></tr>
                        <tr><th>{{ trans('adminlte.created_at') }}</th><td>{{ $group->created_at }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_at') }}</th><td>{{ $group->updated_at }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
