@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.blog.news.update', $news) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('partials.admin._nav')

        @include('admin.blog.news._form')
    </form>
@endsection

{{--@section('content')--}}
{{--    <div class="row">--}}

{{--        <div class="col-md-12">--}}
{{--            <div class="panel panel-default">--}}
{{--                <div class="panel-heading">--}}
{{--                    <h2>--}}
{{--                        Edit News--}}

{{--                        <a href="{{ url('admin/news') }}" class="btn btn-default pull-right">Go Back</a>--}}
{{--                    </h2>--}}
{{--                </div>--}}

{{--                <div class="panel-body">--}}
{{--                    {!! Form::model($post, ['method' => 'PUT', "enctype" => "multipart/form-data", 'url' => "/admin/news/{$post->id}", 'class' => 'form-horizontal', 'role' => 'form']) !!}--}}

{{--                        @include('admin.blog.news._form')--}}

{{--                        <div class="form-group">--}}
{{--                            <div class="col-md-8 col-md-offset-2">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    Update--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    {!! Form::close() !!}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--@endsection--}}
