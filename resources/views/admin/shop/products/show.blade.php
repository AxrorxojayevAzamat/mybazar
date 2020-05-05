@extends('layouts.page')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.shop.products.edit', $product) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>
        <form method="POST" action="{{ route('admin.shop.products.destroy', $product) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">{{ trans('adminlte.delete') }}</button>
        </form>
    </div>

    @php
        $store = $product->store;
        $brand = $product->brand;
    @endphp

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $product->id }}</td>
        </tr>
        <tr><th>{{ trans('adminlte.name') }} Uz</th><td>{{ $product->name_uz }}</td></tr>
        <tr><th>{{ trans('adminlte.name') }} Ru</th><td>{{ $product->name_ru }}</td></tr>
        <tr><th>{{ trans('adminlte.name') }} En</th><td>{{ $product->name_en }}</td></tr>
        <tr><th>{{ trans('adminlte.description') }} Uz</th><td>{!! $product->description_uz !!}</td></tr>
        <tr><th>{{ trans('adminlte.description') }} Ru</th><td>{!! $product->description_ru !!}</td></tr>
        <tr><th>{{ trans('adminlte.description') }} En</th><td>{!! $product->description_en !!}</td></tr>
        <tr><th>Slug</th><td>{{ $product->slug }}</td></tr>
        <tr><th>{{ trans('adminlte.store.name') }}</th><td><a href="{{ route('admin.stores.show', $store) }}">{{ $store->name }}</a></td></tr>
        <tr><th>{{ trans('adminlte.brand.name') }}</th><td><a href="{{ route('admin.brands.show', $brand) }}">{{ $brand->name }}</a></td></tr>
        <tr>
            <th>{{ trans('menu.categories') }}</th>
            <td>
                @foreach($product->categories as $category)
                    <a href="{{ route('admin.shop.categories.show', $category) }}">{{ $category->name }}</a><br>
                @endforeach
            </td>
        </tr>
        <tr>
            <th>{{ trans('adminlte.product.main_photo') }}</th>
                <td>
                    @if ($product->mainPhoto)
                        <a href="/storage/{{ $product->mainPhoto->file }}" target="_blank"><img src="/storage/{{ $product->mainPhoto->file }}"></a>

                    @endif
                </td>
        </tr>
        <tr><th>{{ trans('adminlte.product.price_uzs') }}</th><td>{{ $product->price_uzs }}</td></tr>
        <tr><th>{{ trans('adminlte.product.price_usd') }}</th><td>{{ $product->price_usd }}</td></tr>
        <tr><th>{{ trans('adminlte.product.discount') }}</th><td>{{ $product->discount }}</td></tr>
        <tr><th>{{ trans('adminlte.status') }}</th><td>{!! \App\Helpers\ProductHelper::getStatusLabel($product->status) !!}</td></tr>
        <tr><th>{{ trans('adminlte.created_by') }}</th><td>{{ $product->createdBy->name }}</td></tr>
        <tr><th>{{ trans('adminlte.product.weight') }}</th><td>{{ $product->weight }}</td></tr>
        <tr><th>{{ trans('adminlte.product.quantity') }}</th><td>{{ $product->quantity }}</td></tr>
        <tr><th>{{ trans('adminlte.product.guarantee') }}</th><td>{{ $product->guarantee ? 'Да' : 'Нет' }}</td></tr>
        <tr><th>{{ trans('adminlte.product.bestseller') }}</th><td>{{ $product->bestseller ? 'Да' : 'Нет' }}</td></tr>
        <tr><th>{{ trans('adminlte.new') }}</th><td>{{ $product->new ? 'Да' : 'Нет' }}</td></tr>
        <tr><th>{{ trans('adminlte.rating') }}</th><td>{{ $product->rating }}</td></tr>
        <tr><th>{{ trans('adminlte.updated_by') }}</th><td>{{ $product->updatedBy->name }}</td></tr>
        <tr><th>{{ trans('adminlte.created_at') }}</th><td>{{ $product->created_at }}</td></tr>
        <tr><th>{{ trans('adminlte.updated_at') }}</th><td>{{ $product->updated_at }}</td></tr>
        <tbody>
        </tbody>
    </table>
@endsection
