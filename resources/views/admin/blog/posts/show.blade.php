@extends('layouts.admin.page')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.blog.posts.edit', $post) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>

        @if (Auth::user()->isAdmin())
            <form method="POST" action="{{ route($post->is_published ? 'admin.blog.posts.discard' : 'admin.blog.posts.publish', $post) }}" class="mr-1">
                @csrf
                <button class="btn{{ $post->is_published ? ' btn-warning' : ' btn-success' }}"
                        onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">
                    {{ trans($post->is_published ? 'adminlte.draft' : 'adminlte.publish') }}
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
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.main') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr><th>ID</th><td>{{ $post->id }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Uz</th><td>{{ $post->title_uz }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Ru</th><td>{{ $post->title_ru }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} En</th><td>{{ $post->title_en }}</td></tr>
                        <tr><th>{{ trans('adminlte.description') }} Uz</th><td>{!! $post->description_uz !!}</td></tr>
                        <tr><th>{{ trans('adminlte.description') }} Ru</th><td>{!! $post->description_ru !!}</td></tr>
                        <tr><th>{{ trans('adminlte.description') }} En</th><td>{!! $post->description_en !!}</td></tr>
                        <tr><th>{{ trans('adminlte.body') }} Uz</th><td>{!! $post->body_uz !!}</td></tr>
                        <tr><th>{{ trans('adminlte.body') }} Ru</th><td>{!! $post->body_ru !!}</td></tr>
                        <tr><th>{{ trans('adminlte.body') }} En</th><td>{!! $post->body_en !!}</td></tr>
                        <tr>
                            <th>{{ trans('adminlte.category.name') }}</th>
                            <td><a href="{{ route('admin.categories.show', $post->category) }}"></a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.is_published') }}</th>
                            <td>{!! $post->published !!}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.image') }}</h3></div>
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
                    <div class="card-header"><h3 class="card-title">{{ trans('adminlte.others') }}</h3></div>
                    <div class="card-body">
                        <table class="table {{--table-bordered--}} table-striped projects">
                            <tbody>
                            <tr>
                                <th>{{ trans('adminlte.created_by') }}</th>
                                <td><a href="{{ route('admin.users.show', $post->createdBy) }}">{{ $post->createdBy->name }}</a></td>
                            </tr>
                            <tr>
                                <th>{{ trans('adminlte.updated_by') }}</th>
                                <td><a href="{{ route('admin.users.show', $post->updatedBy) }}">{{ $post->updatedBy->name }}</a></td>
                            </tr>
                            <tr><th>{{ trans('adminlte.created_at') }}</th><td>{{ $post->created_at }}</td></tr>
                            <tr><th>{{ trans('adminlte.updated_at') }}</th><td>{{ $post->updated_at }}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
