@extends('layouts.page')

@section('content')
    <p><a href="{{ route('admin.shop.products.create') }}" class="btn btn-success">{{ trans('adminlte.product.add') }}</a></p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>{{ trans('adminlte.name') }}</th>
            <th>Slug</th>
            <th>{{ trans('adminlte.status') }}</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($products as $product)
            <tr>
                <td><a href="{{ route('admin.shop.products.show', $product) }}">{{ $product->name }}</a></td>
                <td>{{ $product->slug }}</td>
                <td>{!! \App\Helpers\ProductHelper::getStatusLabel($product->status) !!}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
