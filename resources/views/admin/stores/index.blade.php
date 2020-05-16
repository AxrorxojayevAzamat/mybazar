@extends('layouts.page')

@if (!config('adminlte.enabled_laravel_mix'))
    @php($javaScriptSectionName = 'js')
@else
    @php($javaScriptSectionName = 'mix_adminlte_js')
@endif

@section('content')
    <p><a href="{{ route('admin.stores.create') }}" class="btn btn-success">{{ trans('adminlte.store.add') }}</a></p>

    <div class="card mb-4">
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::text('name', request('name'), ['class'=>'form-control', 'placeholder' => trans('adminlte.name')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::select('category_id', $categories, request('category_id'), ['class'=>'form-control', 'id' => 'category_id', 'placeholder' => trans('adminlte.category.name')]) !!}
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
            <th>Logo</th>
            <th>{{ trans('adminlte.name') }}</th>
            <th>Slug</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($stores as $store)
            <tr>
                <td>
                    @if ($store->logo)
                        <a href="{{ $store->logoOriginal }}" target="_blank"><img src="{{ $store->logoThumbnail }}"></a>
                    @endif
                </td>
                <td><a href="{{ route('admin.stores.show', $store) }}">{{ $store->name }}</a></td>
                <td>{{ $store->slug }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $stores->links() }}
@endsection

@section($javaScriptSectionName)
    <script>
        $('#category_id').select2();
        // $('#store_id').select2();
        // $('#brand_id').select2();
    </script>
@endsection
