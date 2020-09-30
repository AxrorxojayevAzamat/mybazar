@extends('layouts.admin.page')

@section('content')
    <p><a href="{{ route('admin.shop.products.create') }}" class="btn btn-success">{{ trans('adminlte.create') }}</a></p>

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ trans('adminlte.name') }}</th>
                                <th>{{ trans('adminlte.type') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td><a href="{{ route('admin.blog.categories.show', $category) }}">{{ $category->name }}</a></td>
                                    <td>{{ $category->typeName() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {!! $categories->links() !!}

                </div>
            </div>
        </div>

    </div>
@endsection
