@extends('layouts.admin.page')

@php($isAdmin = Auth::user()->isAdmin())

@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>
                    Banners

                    <a href="{{ route('admin.banners.create') }}" class="btn btn-default pull-right">Create New</a>
                </h2>
            </div>

            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ trans('adminlte.image') }}</th>
                            <th>{{ trans('adminlte.title') }}</th>
                            <th>{{ trans('adminlte.description') }}</th>
                            <th>{{ trans('adminlte.url') }}</th>
                            <th>{{ trans('adminlte.slug') }}</th>
                            <th>{{ trans('adminlte.author') }}</th>
                            <th>{{ trans('adminlte.is_published') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($banners as $banner)
                        <tr>
                            <td>
                                @if ($banner->file)
                                <a href="{{ $banner->fileOriginal }}" target="_blank"><img src="{{ $banner->fileThumbnail }}" alt=""></a>
                                @endif
                            </td>
                            <td><a href="{{ route('admin.banners.show', $banner) }}">{{ $banner->title }}</a></td>
                            <td>{{ $banner->url }}</td>
                            <td>{{ $banner->slug }}</td>
                            <td>
                                @if ($isAdmin)
                                <a href="{{ route('admin.users.show', $banner->createdBy) }}">{{ $banner->createdBy->name }}</a>
                                @else
                                {{ $banner->createdBy->name }}
                                @endif
                            </td>
                            <td>{!! $banner->published !!}</td>
                            <td>
                                @if ($isAdmin)
                                @if ($banner->is_published)
                                <a href="{{ route('admin.blog.news.discard', $banner) }}" data-method="POST" data-token="{{ csrf_token() }}"
                                   data-confirm="Are you sure?" class="btn btn-xs btn-warning">Draft</a>
                                @else
                                <a href="{{ route('admin.blog.news.publish', $banner) }}" data-method="POST" data-token="{{ csrf_token() }}"
                                   data-confirm="Are you sure?" class="btn btn-xs btn-warning">Publish</a>
                                @endif
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">No news available.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                {!! $banners->links() !!}

            </div>
        </div>
    </div>

</div>
@endsection
