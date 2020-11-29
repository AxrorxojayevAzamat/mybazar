@extends('layouts.admin.page')

@php($user = Auth::user())

@section('content')
    <div class="d-flex flex-row mb-3">
        @can('edit-own-product', $product)
            <a href="{{ route('admin.shop.products.edit', $product) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>
        @endcan
        @if ($product->isOnModeration() && Gate::allows('alter-products-status'))
            <form method="POST" action="{{ route('admin.shop.products.moderate', $product) }}" class="mr-1">
                @csrf
                <button class="btn btn-primary" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">@lang('adminlte.publish')</button>
            </form>
        @elseif (($product->isDraft() || $product->isClosed()) && Gate::allows('alter-products-status'))
            <form method="POST" action="{{ route('admin.shop.products.on-moderation', $product) }}" class="mr-1">
                @csrf
                <button class="btn btn-success" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">@lang('adminlte.send_to_moderation')</button>
            </form>
        @elseif($product->isActive() && Gate::allows('close-own-product', $product))
            <form method="POST" action="{{ route('admin.shop.products.close', $product) }}" class="mr-1">
                @csrf
                <button class="btn btn-danger" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">@lang('adminlte.close')</button>
            </form>
            @can('alter-products-status')
                <form method="POST" action="{{ route('admin.shop.products.draft', $product) }}" class="mr-1">
                    @csrf
                    <button class="btn btn-default" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">@lang('adminlte.draft')</button>
                </form>
            @endcan
        @elseif ($product->isDraftAfterCategorySplit() && Gate::check('alter-products-status'))
            <form method="POST" action="{{ route('admin.shop.products.activate', $product) }}" class="mr-1">
                @csrf
                <button class="btn btn-success">@lang('adminlte.activate')</button>
            </form>
        @endif
        <a href="{{ route('admin.shop.products.main-photo', $product) }}" class="btn btn-dark mr-1">{{ trans('adminlte.product.add_main_photo') }}</a>
        <a href="{{ route('admin.shop.products.photos', $product) }}" class="btn btn-secondary mr-1">{{ trans('adminlte.product.add_photos') }}</a>
        <a href="{{ route('admin.shop.products.values.add', $product) }}" class="btn btn-warning mr-1">{{ trans('adminlte.value.add') }}</a>
        <a href="{{ route('admin.shop.products.reviews.index', $product) }}" class="btn btn-info mr-1">{{ trans('adminlte.product.reviews') }}</a>
        <form method="POST" action="{{ route('admin.shop.products.destroy', $product) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">{{ trans('adminlte.delete') }}</button>
        </form>
    </div>

    @php($mainCategory = $product->mainCategory)
    @php($store = $product->store)
    @php($brand = $product->brand)

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.main') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr><th>ID</th><td>{{ $product->id }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Uz</th><td>{{ $product->name_uz }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Ru</th><td>{{ $product->name_ru }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} En</th><td>{{ $product->name_en }}</td></tr>
                        <tr><th>{{ trans('adminlte.description') }} Uz</th><td>{!! $product->description_uz !!}</td></tr>
                        <tr><th>{{ trans('adminlte.description') }} Ru</th><td>{!! $product->description_ru !!}</td></tr>
                        <tr><th>{{ trans('adminlte.description') }} En</th><td>{!! $product->description_en !!}</td></tr>
                        <tr><th>Slug</th><td>{{ $product->slug }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.product.main_photo') }}</h3></div>
                <div class="card-body">
                    @if ($product->mainPhoto)
                        <a href="{{ $product->mainPhoto->fileOriginal }}" target="_blank"><img src="{{ $product->mainPhoto->fileThumbnail }}"></a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.relations') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr><th>{{ trans('adminlte.product.main_category') }}</th><td><a href="{{ route('admin.categories.show', $mainCategory) }}">{{ $mainCategory->name }}</a></td></tr>
                        <tr>
                            <th>{{ trans('adminlte.product.additional_categories') }}</th>
                            <td>
                                @foreach($product->categories as $category)
                                    <a href="{{ route('admin.categories.show', $category) }}">{{ $category->name }}</a><br>
                                @endforeach
                            </td>
                        </tr>
                        @if ($user->isAdmin() || $user->isModerator())
                            <tr><th>{{ trans('adminlte.store.name') }}</th><td><a href="{{ route('admin.stores.show', $store) }}">{{ $store->name }}</a></td></tr>
                        @endif
                        <tr><th>{{ trans('adminlte.brand.name') }}</th><td><a href="{{ route('admin.brands.show', $brand) }}">{{ $brand->name }}</a></td></tr>
                        <tr>
                            <th>{{ trans('menu.marks') }}</th>
                            <td>
                                @foreach($product->marks as $mark)
                                    <a href="{{ route('admin.shop.marks.show', $mark) }}">{{ $mark->name }}</a><br>
                                @endforeach
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.additional') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr><th>{{ trans('adminlte.price_uzs') }}</th><td>{{ $product->price_uzs }}</td></tr>
                        <tr><th>{{ trans('adminlte.price_usd') }}</th><td>{{ $product->price_usd }}</td></tr>
                        <tr><th>{{ trans('adminlte.product.discount') }}</th><td>{{ $product->discount }}</td></tr>
                        <tr><th>{{ trans('adminlte.status') }}</th><td>{!! \App\Helpers\ProductHelper::getStatusLabel($product->status) !!}</td></tr>
                        <tr><th>{{ trans('adminlte.product.weight') }}</th><td>{{ $product->weight }}</td></tr>
                        <tr><th>{{ trans('adminlte.quantity') }}</th><td>{{ $product->quantity }}</td></tr>
                        <tr><th>{{ trans('adminlte.product.guarantee') }}</th><td>{{ $product->guarantee ? 'Да' : 'Нет' }}</td></tr>
                        <tr><th>{{ trans('adminlte.product.bestseller') }}</th><td>{{ $product->bestseller ? 'Да' : 'Нет' }}</td></tr>
                        <tr><th>{{ trans('adminlte.new') }}</th><td>{{ $product->new ? 'Да' : 'Нет' }}</td></tr>
                        <tr><th>{{ trans('adminlte.rating') }}</th><td>{{ $product->rating }}</td></tr>
                        <tr><th>{{ trans('adminlte.number_of_reviews') }}</th><td>{{ $product->number_of_reviews }}</td></tr>
                        <tr>
                            <th>{{ trans('menu.discounts') }}</th>
                            <td>
                                @foreach($discounts as $discount)
                                    <a href="{{ route('admin.discounts.show', $discount) }}">{{ $discount->name }}</a><br>
                                @endforeach
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.others') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr><th>{{ trans('adminlte.created_by') }}</th><td>{{ $product->createdBy->name }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_by') }}</th><td>{{ $product->updatedBy->name }}</td></tr>
                        <tr><th>{{ trans('adminlte.created_at') }}</th><td>{{ $product->created_at }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_at') }}</th><td>{{ $product->updated_at }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card" id="photos">
        <div class="card-header border">{{ trans('adminlte.photo.plural') }}</div>
        <div class="card-body">
            <div class="row">
                @foreach($product->photos as $photo)
                    <div class="col-md-2 col-xs-3" style="text-align: center">
                        <div class="btn-group">
                            <a href="{{ route('admin.shop.products.move-photo-up', ['product' => $product, 'photo' => $photo]) }}" id="{{ $product->id }}" class="btn btn-default">
                                <span class="glyphicon glyphicon-arrow-left"></span>
                            </a>
                            {!! Form::open(['url' => route('admin.shop.products.remove-photo', ['product' => $product, 'photo' => $photo])]) !!}
                            @csrf
                            @method('DELETE')
                            <button type="submit" id="{{ $product->id }}" photo_id="{{ $photo->id }}" class="btn btn-default" style="border-radius: 0; margin-left: -1px;"
                                    onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                            {!! Form::close() !!}
                            <a href="{{ route('admin.shop.products.move-photo-down', ['product' => $product, 'photo' => $photo]) }}" id="{{ $product->id }}" class="btn btn-default">
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

    <div class="card" id="modifications">
        <div class="card-header card-green with-border">{{ trans('adminlte.modification.name') }}</div>
        <div class="card-body">
            <p><a href="{{ route('admin.shop.products.modifications.create', $product) }}" class="btn btn-success">{{ trans('adminlte.modification.add') }}</a></p>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ trans('adminlte.name') }}</th>
                    <th>{{ trans('adminlte.code') }}</th>
                    <th>{{ trans('adminlte.price_uzs') }}</th>
                    <th>{{ trans('adminlte.type') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($product->modifications as $modification)
                    <tr>
                        <td>{{ $modification->id }}</td>
                        <td><a href="{{ route('admin.shop.products.modifications.show', ['product' => $product, 'modification' => $modification]) }}">{{ $modification->name }}</a></td>
                        <td>{{ $modification->code }}</td>
                        <td>{{ $modification->price_uzs }}</td>
                        <td>{{ $modification->typeName() }}</td>
                        <td>
                            <div class="d-flex flex-row">
                                <form method="POST" action="{{ route('admin.shop.products.modifications.first', ['product' => $product, 'modification' => $modification]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-up"></span></button>
                                </form>
                                <form method="POST" action="{{ route('admin.shop.products.modifications.up', ['product' => $product, 'modification' => $modification]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-up"></span></button>
                                </form>
                                <form method="POST" action="{{ route('admin.shop.products.modifications.down', ['product' => $product, 'modification' => $modification]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-down"></span></button>
                                </form>
                                <form method="POST" action="{{ route('admin.shop.products.modifications.last', ['product' => $product, 'modification' => $modification]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-down"></span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div class="card" id="values">
        <div class="card-header card-gray with-border">{{ trans('adminlte.value.name') }}</div>
        <div class="card-body">
            <p><a href="{{ route('admin.shop.products.values.add', $product) }}" class="btn btn-success">{{ trans('adminlte.value.add') }}</a></p>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>{{ trans('adminlte.characteristic.name') }}</th>
                    <th>{{ trans('adminlte.value.name') }}</th>
                    <th>{{ trans('adminlte.main') }}</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($product->values as $value)
                    @php($characteristic = $value->characteristic)
                    <tr>
                        <td><a href="{{ route('admin.shop.characteristics.show', ['product' => $product, 'characteristic' => $characteristic]) }}">{{ $characteristic->name }}</a></td>
                        <td>{{ $value->value }}</td>
                        <td>{{ $value->main ? trans('adminlte.yes') : trans('adminlte.no') }}</td>
                        <td>
                            <div class="d-flex flex-row">
                                <form method="POST" action="{{ route('admin.shop.products.values.first', ['product' => $product, 'characteristic' => $characteristic]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-up"></span></button>
                                </form>
                                <form method="POST" action="{{ route('admin.shop.products.values.up', ['product' => $product, 'characteristic' => $characteristic]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-up"></span></button>
                                </form>
                                <form method="POST" action="{{ route('admin.shop.products.values.down', ['product' => $product, 'characteristic' => $characteristic]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-down"></span></button>
                                </form>
                                <form method="POST" action="{{ route('admin.shop.products.values.last', ['product' => $product, 'characteristic' => $characteristic]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-down"></span></button>
                                </form>
                            </div>
                        </td>
                        <td class="text-center td-min-width">
                            <a href="{!! route('admin.shop.products.values.show', ['product' => $product, 'characteristic' => $characteristic]) !!}" data-popup="tooltip" title="Show"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
