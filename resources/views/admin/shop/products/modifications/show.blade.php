@extends('layouts.admin.page')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.shop.products.modifications.edit', ['product' => $product, 'modification' => $modification]) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>
        <form method="POST" action="{{ route('admin.shop.products.modifications.destroy', ['product' => $product, 'modification' => $modification]) }}" class="mr-1">
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
                        <tr><th>ID</th><td>{{ $modification->id }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Uz</th><td>{{ $modification->name_uz }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Ru</th><td>{{ $modification->name_ru }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} En</th><td>{{ $modification->name_en }}</td></tr>
                        <tr><th>Code</th><td>{{ $modification->code }}</td></tr>
                        <tr><th>{{ trans('adminlte.price_uzs') }}</th><td>{{ $modification->price_uzs }}</td></tr>
                        <tr><th>{{ trans('adminlte.price_usd') }}</th><td>{{ $modification->price_usd }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if ($modification->photo)
        <div class="row">
            <div class="col-md-12">
                <div class="card card-green card-outline">
                    <div class="card-header"><h3 class="card-title">{{ trans('adminlte.product.main_photo') }}</h3></div>
                    <div class="card-body">
                        <a href="{{ $modification->photoOriginal }}" target="_blank"><img src="{{ $modification->photoThumbnail }}"></a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($modification->color)
        <div class="row">
            <div class="col-md-12">
                <div class="card card-green card-outline">
                    <div class="card-header"><h3 class="card-title">{{ trans('adminlte.color') }}</h3></div>
                    <div class="card-body">
                        <div style="padding: 25px; background-color: {{ $modification->color }};"></div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card card-warning card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.others') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr><th>{{ trans('adminlte.created_by') }}</th><td>{{ $modification->createdBy->name }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_by') }}</th><td>{{ $modification->updatedBy->name }}</td></tr>
                        <tr><th>{{ trans('adminlte.created_at') }}</th><td>{{ $modification->created_at }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_at') }}</th><td>{{ $modification->updated_at }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
