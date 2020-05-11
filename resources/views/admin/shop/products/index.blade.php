@extends('layouts.page')

@if (!config('adminlte.enabled_laravel_mix'))
    @php($javaScriptSectionName = 'js')
@else
    @php($javaScriptSectionName = 'mix_adminlte_js')
@endif

@section('content')
    <p><a href="{{ route('admin.shop.products.create') }}" class="btn btn-success">{{ trans('adminlte.product.add') }}</a></p>

    <div class="card mb-4">
{{--        <div class="card-header">Filter</div>--}}
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            {!! Form::text('name', request('name'), ['class'=>'form-control', 'placeholder' => trans('adminlte.name')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            {!! Form::select('store_id', $stores, request('store_id'), ['class'=>'form-control', 'id' => 'store_id', 'placeholder' => trans('adminlte.store.name')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            {!! Form::select('brand_id', $brands, request('brand_id'), ['class'=>'form-control', 'id' => 'brand_id', 'placeholder' => trans('adminlte.brand.name')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            {!! Form::select('category_id', $categories, request('category_id'), ['class'=>'form-control', 'id' => 'category_id', 'placeholder' => trans('adminlte.category.name')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            {!! Form::select('status', \App\Helpers\ProductHelper::getStatusList(), request('status'), ['class'=>'form-control', 'placeholder' => trans('adminlte.status')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ trans('adminlte.search') }}</button>
                            <a href="?" class="btn btn-outline-secondary">{{ trans('adminlte.clear') }}</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>{{ trans('adminlte.name') }}</th>
            <th>Slug</th>
            <th>{{ trans('adminlte.status') }}</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><a href="{{ route('admin.shop.products.show', $product) }}">{{ $product->name }}</a></td>
                <td>{{ $product->slug }}</td>
                <td>{!! \App\Helpers\ProductHelper::getStatusLabel($product->status) !!}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $products->links() }}
@endsection

@section($javaScriptSectionName)
    <script>
        // $('#category_id').select2();
        $('#store_id').select2();
        $('#brand_id').select2();
    </script>
@endsection
