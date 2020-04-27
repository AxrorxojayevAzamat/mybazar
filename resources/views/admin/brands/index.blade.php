@extends('layouts.page')

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
                <td><a href="/storage/{{ $brand->logo }}" target="_blank"><img src="/storage/{{ $brand->logo }}" style="height: 50%; width: 50%;"></a></td>
                <td>
                    @for ($i = 0; $i < $brand->depth; $i++) &mdash; @endfor
                    <a href="{{ route('admin.brands.show', $brand) }}">{{ $brand->name }}</a>
                </td>
                <td>{{ $brand->slug }}</td>

            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
