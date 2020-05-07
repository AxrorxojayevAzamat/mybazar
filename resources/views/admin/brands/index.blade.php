@extends('layouts.page')

@php
$user = Auth::user();
@endphp

@section('content')
    <p><a href="{{ route('admin.brands.create') }}" class="btn btn-success">{{ trans('adminlte.brand.add') }}</a></p>

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
                <td>
                    @for ($i = 0; $i < $brand->depth; $i++) &mdash; @endfor
                    <a href="{{ route('admin.brands.show', $brand) }}">{{ $brand->name }}</a>
                </td>
                <td>{{ $brand->slug }}</td>

            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $brands->links() }}
@endsection
