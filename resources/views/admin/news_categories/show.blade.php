@extends('layouts.admin.page')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        {{ $category->name_ru }} <small></small>

                        <a href="{{ url('admin/news-categories') }}" class="btn btn-default pull-right">Go Back</a>
                    </h2>
                </div>

                <div class="panel-body">
                    <p>{{ $category->name_ru }}</p>
                </div>
            </div>
        </div>

    </div>
@endsection
