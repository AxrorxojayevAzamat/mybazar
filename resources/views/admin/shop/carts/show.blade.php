@extends('layouts.admin.page')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.main') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tr><th>ID</th><td>{{ $cart->id }}</td></tr>
                        <tr>
                            <th>{{ trans('adminlte.user.name') }}</th>
                            <td>
                                @can ('manage-users')
                                    <a href="{{ route('admin.users.show', $cart->user) }}">{{ $cart->user->name }}</a>
                                @else
                                    {{ $cart->user->name }}
                                @endcan
                            </td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.product.name') }}</th>
                            <td>
                                @can ('manage-shop-products')
                                    <a href="{{ route('admin.shop.products.show', $cart->product) }}">{{ $cart->product->name }}</a>
                                @else
                                    {{ $cart->product->name }}
                                @endcan
                            </td>
                        </tr>>
                        <tr>
                            <th>{{ trans('adminlte.modification.name') }}</th>
                            <td>
                                @can ('manage-shop-products')
                                    <a href="{{ route('admin.shop.products.modifications.show', $cart->modification) }}">{{ $cart->modification->name }}</a>
                                @else
                                    {{ $cart->modification->name }}
                                @endcan
                            </td>
                        </tr>
                        <tr><th>{{ trans('adminlte.quantity') }}</th><td>{{ $cart->quantity }}</td></tr>
                        <tr><th>{{ trans('adminlte.created_at') }}</th><td>{{ $cart->created_at }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_at') }}</th><td>{{ $cart->updated_at }}</td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
