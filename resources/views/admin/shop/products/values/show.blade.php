@extends('layouts.admin.page')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.shop.products.values.edit', ['product' => $product, 'characteristic' => $characteristic]) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>
        <form method="POST" action="{{ route('admin.shop.products.values.destroy', ['product' => $product, 'characteristic' => $characteristic]) }}" class="mr-1">
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
                        <tr><th>{{ trans('adminlte.characteristic.name') }}</th><td><a href="{{ route('admin.shop.characteristics.show', [
                                    'characteristic' => $characteristic]) }}">{{ $characteristic->name }}</a></td></tr>
                        <tr><th>{{ trans('adminlte.value.name') }}</th><td>{{ $value->value }}</td></tr>
                        <tr><th>{{ trans('adminlte.main') }}</th><td>{{ $value->main ? trans('adminlte.yes') : trans('adminlte.no') }}</td></tr>
                        <tr><th>{{ trans('adminlte.sort') }}</th><td>{{ $value->sort }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
