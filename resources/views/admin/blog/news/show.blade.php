@extends('layouts.admin.page')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.blog.news.edit', $news) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>

        @if (Auth::user()->isAdmin())
            <form method="POST" action="{{ route($news->is_published ? 'admin.blog.news.discard' : 'admin.blog.news.publish', $news) }}" class="mr-1">
                @csrf
                <button class="btn{{ $news->is_published ? ' btn-warning' : ' btn-success' }}"
                        onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">
                    {{ trans($news->is_published ? 'adminlte.draft' : 'adminlte.publish') }}
                </button>
            </form>
        @endif

        <form method="POST" action="{{ route('admin.blog.news.destroy', $news) }}" class="mr-1">
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
                        <tr><th>ID</th><td>{{ $news->id }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Uz</th><td>{{ $news->title_uz }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Ru</th><td>{{ $news->title_ru }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} En</th><td>{{ $news->title_en }}</td></tr>
                        <tr><th>{{ trans('adminlte.description') }} Uz</th><td>{!! $news->description_uz !!}</td></tr>
                        <tr><th>{{ trans('adminlte.description') }} Ru</th><td>{!! $news->description_ru !!}</td></tr>
                        <tr><th>{{ trans('adminlte.description') }} En</th><td>{!! $news->description_en !!}</td></tr>
                        <tr><th>{{ trans('adminlte.body') }} Uz</th><td>{!! $news->body_uz !!}</td></tr>
                        <tr><th>{{ trans('adminlte.body') }} Ru</th><td>{!! $news->body_ru !!}</td></tr>
                        <tr><th>{{ trans('adminlte.body') }} En</th><td>{!! $news->body_en !!}</td></tr>
                        <tr>
                            <th>{{ trans('adminlte.category.name') }}</th>
                            <td><a href="{{ route('admin.blog.categories.show', $news->category) }}"></a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.is_published') }}</th>
                            <td>{!! $news->published !!}</td>
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
                    @if ($news->file)
                        <a href="{{ $news->fileOriginal }}" target="_blank"><img src="{{ $news->fileThumbnail }}"></a>
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
                                <td><a href="{{ route('admin.users.show', $news->createdBy) }}">{{ $news->createdBy->name }}</a></td>
                            </tr>
                            <tr>
                                <th>{{ trans('adminlte.updated_by') }}</th>
                                <td><a href="{{ route('admin.users.show', $news->updatedBy) }}">{{ $news->updatedBy->name }}</a></td>
                            </tr>
                            <tr><th>{{ trans('adminlte.created_at') }}</th><td>{{ $news->created_at }}</td></tr>
                            <tr><th>{{ trans('adminlte.updated_at') }}</th><td>{{ $news->updated_at }}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
