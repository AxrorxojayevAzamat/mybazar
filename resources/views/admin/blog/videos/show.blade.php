@extends('layouts.admin.page')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.blog.videos.edit', $video) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>

        @if (Auth::user()->isAdmin())
            <form method="POST" action="{{ route($video->isPublished() ? 'admin.blog.videos.discard' : 'admin.blog.videos.publish', $video) }}" class="mr-1">
                @csrf
                <button class="btn{{ $video->isPublished() ? ' btn-warning' : ' btn-success' }}"
                        onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">
                    {{ trans($video->isPublished() ? 'adminlte.draft' : 'adminlte.publish') }}
                </button>
            </form>
        @endif

        <form method="POST" action="{{ route('admin.blog.videos.destroy', $video) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">{{ trans('adminlte.delete') }}</button>
        </form>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.main') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr><th>ID</th><td>{{ $video->id }}</td></tr>
                        <tr><th>@lang('adminlte.name') Uz</th><td>{{ $video->title_uz }}</td></tr>
                        <tr><th>@lang('adminlte.name') Ru</th><td>{{ $video->title_ru }}</td></tr>
                        <tr><th>@lang('adminlte.name') En</th><td>{{ $video->title_en }}</td></tr>
                        <tr><th>@lang('adminlte.description') Uz</th><td>{!! $video->description_uz !!}</td></tr>
                        <tr><th>@lang('adminlte.description') Ru</th><td>{!! $video->description_ru !!}</td></tr>
                        <tr><th>@lang('adminlte.description') En</th><td>{!! $video->description_en !!}</td></tr>
                        <tr><th>@lang('adminlte.body') Uz</th><td>{!! $video->body_uz !!}</td></tr>
                        <tr><th>@lang('adminlte.body') Ru</th><td>{!! $video->body_ru !!}</td></tr>
                        <tr><th>@lang('adminlte.body') En</th><td>{!! $video->body_en !!}</td></tr>
                        <tr>
                            <th>@lang('adminlte.category.name')</th>
                            <td><a href="{{ route('admin.categories.show', $video->category) }}">{{ $video->category->name }}</a></td>
                        </tr>
                        <tr><th>@lang('adminlte.status')</th><td>{!! $video->statusLabel() !!}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">Logo</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr>
                            <th>@lang('adminlte.image')</th>
                            <td>
                                @if ($video->poster)
                                    <a href="{{ $video->posterOriginal }}" target="_blank"><img src="{{ $video->posterThumbnail }}"></a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('adminlte.video')</th>
                            <td>
                                @if ($video->video)
                                    <a href="{{ $video->videoFile }}" target="_blank">{{ $video->videoFile }}</a>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if (Auth::user()->isAdmin())
        <div class="row">
            <div class="col-md-12">
                <div class="card card-gray card-outline">
                    <div class="card-header"><h3 class="card-title">@lang('adminlte.others')</h3></div>
                    <div class="card-body">
                        <table class="table {{--table-bordered--}} table-striped projects">
                            <tbody>
                            <tr>
                                <th>@lang('adminlte.created_by')</th>
                                <td><a href="{{ route('admin.users.show', $video->createdBy) }}">{{ $video->createdBy->name }}</a></td>
                            </tr>
                            <tr>
                                <th>@lang('adminlte.updated_by')</th>
                                <td><a href="{{ route('admin.users.show', $video->updatedBy) }}">{{ $video->updatedBy->name }}</a></td>
                            </tr>
                            <tr><th>@lang('adminlte.created_at')</th><td>{{ $video->created_at }}</td></tr>
                            <tr><th>@lang('adminlte.updated_at')</th><td>{{ $video->updated_at }}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
