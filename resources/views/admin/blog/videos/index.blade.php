@extends('layouts.admin.page')

@php($isAdmin = Auth::user()->isAdmin())

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        <a href="{{ route('admin.blog.videos.create') }}" class="btn btn-default pull-right">{{ trans('adminlte.create') }}</a>
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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($videos as $video)
                            <tr>
                                <td>
                                    @if ($video->poster)
                                        <a href="{{ $video->posterOriginal }}" target="_blank"><img src="{{ $video->posterThumbnail }}" alt=""></a>
                                    @endif
                                </td>
                                <td><a href="{{ route('admin.blog.videos.show', $video) }}">{{ $video->title }}</a></td>
                                <td>{!! $video->description !!}</td>
                                <td>
                                    @if ($isAdmin)
                                        <a href="{{ route('admin.users.show', $video->createdBy) }}">{{ $video->createdBy->name }}</a>
                                    @else
                                        {{ $video->createdBy->name }}
                                    @endif
                                </td>
                                <td><a href="{{ route('admin.categories.show', $video->category) }}">{{ $video->category->name }}</a></td>
                                <td>{!! $video->published !!}</td>
                                <td>
                                    @if ($isAdmin)
                                        @if ($video->is_published)
                                            <a href="{{ route('admin.blog.videos.discard', $video) }}" data-method="POST" data-token="{{ csrf_token() }}"
                                               data-confirm="Are you sure?" class="btn btn-xs btn-warning">Draft</a>
                                        @else
                                            <a href="{{ route('admin.blog.videos.publish', $video) }}" data-method="POST" data-token="{{ csrf_token() }}"
                                               data-confirm="Are you sure?" class="btn btn-xs btn-warning">Publish</a>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    {!! $videos->links() !!}
                </div>
            </div>
        </div>

    </div>
@endsection
