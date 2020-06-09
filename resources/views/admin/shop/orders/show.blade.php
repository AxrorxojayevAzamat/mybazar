@extends('layouts.admin.page')

@php($delivery = $order->deliveryMethod)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.main') }}</h3></div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr><th>ID</th><td>{{ $order->id }}</td></tr>
                        <tr>
                            <th>{{ trans('adminlte.user.name') }}</th>
                            <td>
                                @can ('manage-users')
                                    <a href="{{ route('admin.users.show', $order->user) }}">{{ $order->user->name }}</a>
                                @else
                                    {{ $order->user->name }}
                                @endcan
                            </td>
                        </tr>
                        <tr><th>{{ trans('adminlte.full_name') }}</th><td>{{ $order->name }}</td></tr>
                        <tr><th>{{ trans('adminlte.phone') }}</th><td>{{ $order->phone }}</td></tr>
                        <tr><th>{{ trans('adminlte.cost') }}</th><td>{{ $order->cost }}</td></tr>
                        <tr><th>{{ trans('adminlte.note') }}</th><td>{{ $order->note }}</td></tr>
                        <tr>
                            <th>{{ trans('adminlte.status') }}</th>
                            <td>
                                {{ $order->status }}
                            </td>
                        </tr>
                        @if ($order->cancel_reason)
                            <tr><th>{{ trans('adminlte.cancel_reason') }}</th><td>{{ $order->cancel_reason }}</td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-warning card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.delivery.delivery') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr>
                            <th>{{ trans('adminlte.delivery.name') }}</th>
                            <td><a href="{{ route('admin.deliveries.show', $delivery) }}">{{ $order->deliveryMethodName }}</a></td>
                        </tr>
                        <tr><th>{{ trans('adminlte.delivery.cost') }}</th><td>{{ $delivery->cost }}</td></tr>
                        <tr><th>{{ trans('adminlte.delivery.index') }}</th><td>{{ $order->delivery_index }}</td></tr>
                        <tr><th>{{ trans('adminlte.delivery.address') }}</th><td>{{ $order->delivery_address }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-warning card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('menu.order_items') }}</h3></div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>{{ trans('adminlte.product.name') }}</th>
                            <th>{{ trans('adminlte.modification.name') }}</th>
                            <th>{{ trans('adminlte.cost') }}</th>
                            <th>{{ trans('adminlte.quantity') }}</th>
                            <th>{{ trans('adminlte.created_at') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($order->orderItems as $item)
                            <tr>
                                @can ('manage-shop-products')
                                    <td><a href="{{ route('admin.shop.products.show', $item->product_id) }}">{{ $item->productName }}</a></td>
                                    <td><a href="{{ route('admin.shop.products.modifications.show', $item->modification_id) }}">{{ $item->modificationName }}</a></td>
                                @else
                                    <td>{{ $item->productName }}</td>
                                    <td>{{ $item->modificationName }}</td>
                                @endcan
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
