@extends('layouts.page')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.shop.products.edit', $product) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>
        <a href="{{ route('admin.shop.products.main-photo', $product) }}" class="btn btn-dark mr-1">{{ trans('adminlte.product.add_main_photo') }}</a>
        <a href="{{ route('admin.shop.products.photos', $product) }}" class="btn btn-secondary mr-1">{{ trans('adminlte.product.add_photos') }}</a>
        <form method="POST" action="{{ route('admin.shop.products.destroy', $product) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">{{ trans('adminlte.delete') }}</button>
        </form>
    </div>

    @php($store = $product->store)
    @php($brand = $product->brand)

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
                        <a href="{{ $product->mainPhoto->fileOriginal }}" target="_blank"><img src="{{ $product->mainPhoto->fileThumbnail }}"></a>
                    @endif
                </td>
        </tr>
        <tr><th>{{ trans('adminlte.product.price_uzs') }}</th><td>{{ $product->price_uzs }}</td></tr>
        <tr><th>{{ trans('adminlte.product.price_usd') }}</th><td>{{ $product->price_usd }}</td></tr>
        <tr><th>{{ trans('adminlte.product.discount') }}</th><td>{{ $product->discount }}</td></tr>
        <tr><th>{{ trans('adminlte.status') }}</th><td>{!! \App\Helpers\ProductHelper::getStatusLabel($product->status) !!}</td></tr>
        <tr><th>{{ trans('adminlte.product.weight') }}</th><td>{{ $product->weight }}</td></tr>
        <tr><th>{{ trans('adminlte.product.quantity') }}</th><td>{{ $product->quantity }}</td></tr>
        <tr><th>{{ trans('adminlte.product.guarantee') }}</th><td>{{ $product->guarantee ? 'Да' : 'Нет' }}</td></tr>
        <tr><th>{{ trans('adminlte.product.bestseller') }}</th><td>{{ $product->bestseller ? 'Да' : 'Нет' }}</td></tr>
        <tr><th>{{ trans('adminlte.new') }}</th><td>{{ $product->new ? 'Да' : 'Нет' }}</td></tr>
        <tr><th>{{ trans('adminlte.rating') }}</th><td>{{ $product->rating }}</td></tr>
        <tr><th>{{ trans('adminlte.created_by') }}</th><td>{{ $product->createdBy->name }}</td></tr>
        <tr><th>{{ trans('adminlte.updated_by') }}</th><td>{{ $product->updatedBy->name }}</td></tr>
        <tr><th>{{ trans('adminlte.created_at') }}</th><td>{{ $product->created_at }}</td></tr>
        <tr><th>{{ trans('adminlte.updated_at') }}</th><td>{{ $product->updated_at }}</td></tr>
        <tbody>
        </tbody>
    </table>

    <div class="card" id="photos">
        <div class="card-header border">{{ trans('adminlte.photo.plural') }}</div>
        <div class="card-body">
            <div class="row">
                @foreach($product->photos as $photo)
                    <div class="col-md-2 col-xs-3" style="text-align: center">
                        <div class="btn-group">
                            <a href="{{ route('admin.shop.products.move-photo-up', ['product' => $product, 'photo' => $photo]) }}" id="{{ $product->id }}" photo_id="{{ $photo->id }}" class="btn btn-default">
                                <span class="glyphicon glyphicon-arrow-left"></span>
                            </a>
                            <a href="{{ route('admin.shop.products.delete-photo', ['product' => $product, 'photo' => $photo]) }}" id="{{ $product->id }}" photo_id="{{ $photo->id }}" class="btn btn-default" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
                            <a href="{{ route('admin.shop.products.move-photo-down', ['product' => $product, 'photo' => $photo]) }}" id="{{ $product->id }}" photo_id="{{ $photo->id }}" class="btn btn-default">
                                <span class="glyphicon glyphicon-arrow-right"></span>
                            </a>
                        </div>
                        <div style="margin-top: 10px;">
                            <a href="{{ $photo->fileOriginal }}" target="_blank" class="img-thumbnail"><img src="{{ $photo->fileThumbnail }}"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
