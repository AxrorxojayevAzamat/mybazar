@extends('layouts.page')

@php
$user = Auth::user();
@endphp

@section('content')
    <p><a href="{{ route('admin.brands.create') }}" class="btn btn-success">{{ trans('adminlte.brand.add') }}</a></p>

    <div class="card mb-4">
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

        @foreach ($brands as $brand)
            <tr>
                <td>
                    @if ($brand->logo)
                        <a href="{{ $brand->logoOriginal }}" target="_blank"><img src="{{ $brand->logoThumbnail }}"></a>
                    @endif
                </td>
                <td><a href="{{ route('admin.brands.show', $brand) }}">{{ $brand->name }}</a></td>
                <td>{{ $brand->slug }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $brands->links() }}
@endsection
