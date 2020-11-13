@extends('layouts.admin.page')

@php($isAdmin = Auth::user()->isAdmin())

@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>
                    @lang('menu.banners')
                    <a href="{{ route('admin.banners.create') }}" class="btn btn-default pull-right">@lang('adminlte.create')</a>
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
                            <th>{{ trans('adminlte.category.name') }}</th>
                            <th>{{ trans('adminlte.status') }}</th>
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
                            <td>{{ $banner->description }}</td>
                            <td>{{ $banner->url }}</td>
                            <td>{{ $banner->slug }}</td>
                            <td>
                                @if ($isAdmin)
                                    <a href="{{ route('admin.users.show', $banner->createdBy) }}">{{ $banner->createdBy->name }}</a>
                                @else
                                    {{ $banner->createdBy->name }}
                                @endif
                            </td>
                            <td><a href="{{ route('admin.categories.show', $banner->category) }}">{{ $banner->category->name }}</a></td>
                            <td>{!! $banner->statusLabel() !!}</td>
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
