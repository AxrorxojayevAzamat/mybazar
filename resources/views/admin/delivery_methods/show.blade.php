@extends('layouts.admin.page')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.deliveries.edit', $delivery) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>
        <form method="POST" action="{{ route('admin.deliveries.destroy', $delivery) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">{{ trans('adminlte.delete') }}</button>
        </form>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.main') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr><th>ID</th><td>{{ $delivery->id }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Uz</th><td>{{ $delivery->name_uz }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Ru</th><td>{{ $delivery->name_ru }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} En</th><td>{{ $delivery->name_en }}</td></tr>
                        <tr><th>{{ trans('adminlte.description') }} Uz</th><td>{!! $delivery->description_uz !!}</td></tr>
                        <tr><th>{{ trans('adminlte.description') }} Ru</th><td>{!! $delivery->description_ru !!}</td></tr>
                        <tr><th>{{ trans('adminlte.description') }} En</th><td>{!! $delivery->description_en !!}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-green card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.additional') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr><th>{{ trans('adminlte.cost') }}</th><td>{{ $delivery->cost }}</td></tr>
                        <tr><th>{{ trans('adminlte.delivery.min_weight') }}</th><td>{{ $delivery->min_weight }}</td></tr>
                        <tr><th>{{ trans('adminlte.delivery.max_weight') }}</th><td>{{ $delivery->max_weight }}</td></tr>
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
                        <tr><th>{{ trans('adminlte.created_by') }}</th><td>{{ $delivery->createdBy->name }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_by') }}</th><td>{{ $delivery->updatedBy->name }}</td></tr>
                        <tr><th>{{ trans('adminlte.created_at') }}</th><td>{{ $delivery->created_at }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_at') }}</th><td>{{ $delivery->updated_at }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
