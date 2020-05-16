@extends('layouts.page')

@php($parent = $category->parent)

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.shop.categories.edit', $category) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>
        <form method="POST" action="{{ route('admin.shop.categories.destroy', $category) }}" class="mr-1">
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
                    <table class="table{{-- table-bordered--}} table-striped">
                        <tbody>
                        <tr><th>ID</th><td>{{ $category->id }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Uz</th><td>{{ $category->name_uz }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Ru</th><td>{{ $category->name_ru }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} En</th><td>{{ $category->name_en }}</td></tr>
                        <tr><th>{{ trans('adminlte.description') }} Uz</th><td>{{ $category->description_uz }}</td></tr>
                        <tr><th>{{ trans('adminlte.description') }} Ru</th><td>{{ $category->description_ru }}</td></tr>
                        <tr><th>{{ trans('adminlte.description') }} En</th><td>{{ $category->description_en }}</td></tr>
                        <tr><th>Slug</th><td>{{ $category->slug }}</td></tr>
                        <tr><th>{{ trans('adminlte.parent') }}</th><td><a href="{{ route('admin.shop.categories.show', $parent) }}">{{ $parent->name }}</a></td></tr>
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
                    <table class="table{{-- table-bordered--}} table-striped">
                        <tbody>
                        <tr><th>{{ trans('adminlte.created_by') }}</th><td>{{ $category->createdBy->name }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_by') }}</th><td>{{ $category->updatedBy->name }}</td></tr>
                        <tr><th>{{ trans('adminlte.created_at') }}</th><td>{{ $category->created_at }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_at') }}</th><td>{{ $category->updated_at }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
