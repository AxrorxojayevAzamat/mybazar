@extends('layouts.page')

@php($user = Auth::user())

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.stores.edit', $store) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>
        <form method="POST" action="{{ route('admin.stores.destroy', $store) }}" class="mr-1">
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
                        <tr><th>ID</th><td>{{ $store->id }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Uz</th><td>{{ $store->name_uz }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Ru</th><td>{{ $store->name_ru }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} En</th><td>{{ $store->name_en }}</td></tr>
                        <tr><th>Slug</th><td>{{ $store->slug }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">Logo</h3></div>
                <div class="card-body">
                    @if ($store->logo)
                        <a href="{{ $store->logoOriginal }}" target="_blank"><img src="{{ $store->logoThumbnail }}"></a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-warning card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.relations') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr>
                            <th>{{ trans('menu.categories') }}</th>
                            <td>
                                @foreach($store->categories as $category)
                                    <a href="{{ route('admin.shop.categories.show', $category) }}">{{ $category->name }}</a><br>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>{{ trans('menu.marks') }}</th>
                            <td>
                                @foreach($store->marks as $mark)
                                    <a href="{{ route('admin.shop.marks.show', $mark) }}">{{ $mark->name }}</a><br>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>{{ trans('menu.payments') }}</th>
                            <td>
                                @foreach($store->payments as $payment)
                                    <a href="{{ route('admin.payments.show', $payment) }}">{{ $payment->name }}</a><br>
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
            <div class="card card-green card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.others') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr><th>{{ trans('adminlte.created_by') }}</th><td>{{ $store->createdBy->name }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_by') }}</th><td>{{ $store->updatedBy->name }}</td></tr>
                        <tr><th>{{ trans('adminlte.created_at') }}</th><td>{{ $store->created_at }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_at') }}</th><td>{{ $store->updated_at }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
