@extends('layouts.admin.page')

@php($isAdmin = Auth::user()->isAdmin())

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        <a href="{{ route('admin.blog.posts.create') }}" class="btn btn-default pull-right">{{ trans('adminlte.create') }}</a>
                    </h2>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ trans('adminlte.image') }}</th>
                                <th>{{ trans('adminlte.title') }}</th>
                                <th>{{ trans('adminlte.description') }}</th>
                                <th>{{ trans('adminlte.author') }}</th>
                                <th>{{ trans('adminlte.category.name') }}</th>
                                <th>{{ trans('adminlte.is_published') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($posts as $post)
                            <tr>
                                <td>
                                    @if ($post->file)
                                        <a href="{{ $post->fileOriginal }}" target="_blank"><img src="{{ $post->fileThumbnail }}" alt=""></a>
                                    @endif
                                </td>
                                <td><a href="{{ route('admin.blog.posts.show', $post) }}">{{ $post->title }}</a></td>
                                <td>{!! $post->description !!}</td>
                                <td>
                                    @if ($isAdmin)
                                        <a href="{{ route('admin.users.show', $post->createdBy) }}">{{ $post->createdBy->name }}</a>
                                    @else
                                        {{ $post->createdBy->name }}
                                    @endif
                                </td>
                                <td><a href="{{ route('admin.blog.categories.show', $post->category) }}">{{ $post->category->name }}</a></td>
                                <td>{!! $post->published !!}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    {!! $posts->links() !!}
                </div>
            </div>
        </div>

    </div>
@endsection
