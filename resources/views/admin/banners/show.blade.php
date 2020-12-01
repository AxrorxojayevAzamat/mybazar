@extends('layouts.admin.page')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.banners.edit', $banner) }}" class="btn btn-primary mr-1">@lang('adminlte.edit')</a>

        @if (Auth::user()->isAdmin())
            <form method="POST" action="{{ route($banner->isPublished() ? 'admin.banners.discard' : 'admin.banners.publish', $banner) }}" class="mr-1">
                @csrf
                <button class="btn{{ $banner->isPublished() ? ' btn-warning' : ' btn-success' }}"
                        onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">
                    {{ trans($banner->isPublished() ? 'adminlte.draft' : 'adminlte.publish') }}
                </button>
            </form>
        @endif

        <form method="POST" action="{{ route('admin.banners.destroy', $banner) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">@lang('adminlte.delete')</button>
        </form>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">@lang('adminlte.main')</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr><th>ID</th><td>{{ $banner->id }}</td></tr>
                        <tr><th>@lang('adminlte.name') Uz</th><td>{{ $banner->title_uz }}</td></tr>
                        <tr><th>@lang('adminlte.name') Ru</th><td>{{ $banner->title_ru }}</td></tr>
                        <tr><th>@lang('adminlte.name') En</th><td>{{ $banner->title_en }}</td></tr>
                        <tr><th>@lang('adminlte.description') Uz</th><td>{!! $banner->description_uz !!}</td></tr>
                        <tr><th>@lang('adminlte.description') Ru</th><td>{!! $banner->description_ru !!}</td></tr>
                        <tr><th>@lang('adminlte.description') En</th><td>{!! $banner->description_en !!}</td></tr>
                        <tr><th>@lang('adminlte.url')</th><td>{!! $banner->url !!}</td></tr>
                        <tr><th>@lang('adminlte.slug')</th><td>{!! $banner->slug !!}</td></tr>
                        <tr>
                            <th>@lang('adminlte.category.name')</th>
                            <td><a href="{{ route('admin.categories.show', $banner->category) }}">{{ $banner->category->name }}</a></td>
                        </tr>
                        <tr><th>@lang('adminlte.status')</th><td>{!! $banner->statusLabel() !!}</td></tr>
                        <tr><th>@lang('adminlte.type')</th><td>{!! $banner->typeName() !!}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">@lang('adminlte.image')</h3></div>
                <div class="card-body">
                    @if ($banner->file)
                        <a href="{{ $banner->fileOriginal }}" target="_blank"><img src="{{ $banner->fileThumbnail }}"></a>
                    @endif
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
                                <td><a href="{{ route('admin.users.show', $banner->createdBy) }}">{{ $banner->createdBy->name }}</a></td>
                            </tr>
                            <tr>
                                <th>@lang('adminlte.updated_by')</th>
                                <td><a href="{{ route('admin.users.show', $banner->updatedBy) }}">{{ $banner->updatedBy->name }}</a></td>
                            </tr>
                            <tr><th>@lang('adminlte.created_at')</th><td>{{ $banner->created_at }}</td></tr>
                            <tr><th>@lang('adminlte.updated_at')</th><td>{{ $banner->updated_at }}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
