@extends('layouts.admin.page')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.blog.posts.edit', $post) }}" class="btn btn-primary mr-1">@lang('adminlte.edit')</a>

        @if (Auth::user()->isAdmin())
            <form method="POST" action="{{ route($post->isPublished() ? 'admin.blog.posts.discard' : 'admin.blog.posts.publish', $post) }}" class="mr-1">
                @csrf
                <button class="btn{{ $post->isPublished() ? ' btn-warning' : ' btn-success' }}"
                        onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">
                    {{ trans($post->isPublished() ? 'adminlte.draft' : 'adminlte.publish') }}
                </button>
            </form>
        @endif

        <form method="POST" action="{{ route('admin.blog.posts.destroy', $post) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">{{ trans('adminlte.delete') }}</button>
        </form>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header"><h3 class="card-title">@lang('adminlte.main')</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr><th>ID</th><td>{{ $post->id }}</td></tr>
                        <tr><th>@lang('adminlte.name') Uz</th><td>{{ $post->title_uz }}</td></tr>
                        <tr><th>@lang('adminlte.name') Ru</th><td>{{ $post->title_ru }}</td></tr>
                        <tr><th>@lang('adminlte.name') En</th><td>{{ $post->title_en }}</td></tr>
                        <tr><th>@lang('adminlte.description') Uz</th><td>{!! $post->description_uz !!}</td></tr>
                        <tr><th>@lang('adminlte.description') Ru</th><td>{!! $post->description_ru !!}</td></tr>
                        <tr><th>@lang('adminlte.description') En</th><td>{!! $post->description_en !!}</td></tr>
                        <tr><th>@lang('adminlte.body') Uz</th><td>{!! $post->body_uz !!}</td></tr>
                        <tr><th>@lang('adminlte.body') Ru</th><td>{!! $post->body_ru !!}</td></tr>
                        <tr><th>@lang('adminlte.body') En</th><td>{!! $post->body_en !!}</td></tr>
                        <tr>
                            <th>@lang('adminlte.category.name')</th>
                            <td><a href="{{ route('admin.categories.show', $post->category) }}">{{ $post->category->name }}</a></td>
                        </tr>
                        <tr><th>@lang('adminlte.status')</th><td>{!! $post->statusLabel() !!}</td></tr>
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
                    @if ($post->file)
                        <a href="{{ $post->fileOriginal }}" target="_blank"><img src="{{ $post->fileThumbnail }}"></a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if (Auth::user()->isAdmin())
        <div class="row">
            <div class="col-md-12">
                <div class="card card-warning card-outline">
                    <div class="card-header"><h3 class="card-title">@lang('adminlte.others')</h3></div>
                    <div class="card-body">
                        <table class="table {{--table-bordered--}} table-striped projects">
                            <tbody>
                            <tr>
                                <th>@lang('adminlte.created_by')</th>
                                <td><a href="{{ route('admin.users.show', $post->createdBy) }}">{{ $post->createdBy->name }}</a></td>
                            </tr>
                            <tr>
                                <th>@lang('adminlte.updated_by')</th>
                                <td><a href="{{ route('admin.users.show', $post->updatedBy) }}">{{ $post->updatedBy->name }}</a></td>
                            </tr>
                            <tr><th>@lang('adminlte.created_at')</th><td>{{ $post->created_at }}</td></tr>
                            <tr><th>@lang('adminlte.updated_at')</th><td>{{ $post->updated_at }}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
