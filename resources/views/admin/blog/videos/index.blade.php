@extends('layouts.admin.page')

@php($isAdmin = Auth::user()->isAdmin())

@section('content')
    <div class="row">
        <p><a href="{{ route('admin.blog.videos.create') }}" class="btn btn-success">@lang('adminlte.create')</a></p>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>@lang('adminlte.image')</th>
                                <th>@lang('adminlte.title')</th>
                                <th>@lang('adminlte.description')</th>
                                <th>@lang('adminlte.author')</th>
                                <th>@lang('adminlte.category.name')</th>
                                <th>@lang('adminlte.status')</th>
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
                                <td>{!! $video->statusLabel() !!}</td>
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
