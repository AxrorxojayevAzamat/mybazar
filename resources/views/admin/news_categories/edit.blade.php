@extends('layouts.admin.page')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Edit Category

                        <a href="{{ url('admin/news-categories') }}" class="btn btn-default pull-right">Go Back</a>
                    </h2>
                </div>

                <div class="panel-body">
                    {!! Form::model($category, ['method' => 'PUT', 'url' => "/admin/news-categories/{$category->id}", 'class' => 'form-horizontal', 'role' => 'form']) !!}

                        @include('admin.news_categories._form')

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
@endsection
