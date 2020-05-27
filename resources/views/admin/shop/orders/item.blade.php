@extends('layouts.admin.page')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.main') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tr><th>ID</th><td>{{ $item->id }}</td></tr>
                        <tr><th>{{ trans('adminlte.cost') }}</th><td>{{ $item->price }}</td></tr>
                        <tr><th>{{ trans('adminlte.quantity') }}</th><td>{{ $item->quantity }}</td></tr>
                        <tr><th>{{ trans('adminlte.product.discount') }}</th><td>{{ $item->discount }}</td></tr>
                        <tr><th>{{ trans('adminlte.created_at') }}</th><td>{{ $item->created_at }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_at') }}</th><td>{{ $item->updated_at }}</td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card card-green card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.product.name') }}</h3></div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <th>{{ trans('adminlte.product.name') }}</th>
                            <td>
                                @can ('manage-shop-products')
                                    <a href="{{ route('admin.shop.products.show', $item->product) }}">{{ $item->product_name }}</a>
                                @else
                                    {{ $item->product_name }}
                                @endcan
                            </td>
                        </tr>
                        <tr><th>{{ trans('adminlte.code') }}</th><td>{{ $item->product_code }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-warning card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.modification.name') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr>
                            <th>{{ trans('adminlte.product.name') }}</th>
                            <td>
                                @can ('manage-shop-products')
                                    <a href="{{ route('admin.shop.products.modifications.show', $item->modification) }}">{{ $item->modification_name }}</a>
                                @else
                                    {{ $item->modification_name }}
                                @endcan
                            </td>
                        </tr>
                        <tr><th>{{ trans('adminlte.code') }}</th><td>{{ $item->modification_code }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
