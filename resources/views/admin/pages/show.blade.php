@extends('layouts.admin.page')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-primary mr-1">@lang('adminlte.edit')</a>

        <form method="POST" action="{{ route('admin.pages.destroy', $page) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">{{ trans('adminlte.delete') }}</button>
        </form>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">@lang('adminlte.main')</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr><th>ID</th><td>{{ $page->id }}</td></tr>
                        <tr><th>@lang('adminlte.name') Uz</th><td>{{ $page->title_uz }}</td></tr>
                        <tr><th>@lang('adminlte.name') Ru</th><td>{{ $page->title_ru }}</td></tr>
                        <tr><th>@lang('adminlte.name') En</th><td>{{ $page->title_en }}</td></tr>
                        <tr><th>@lang('adminlte.menu_title') Uz</th><td>{{ $page->menu_title_uz }}</td></tr>
                        <tr><th>@lang('adminlte.menu_title') Ru</th><td>{{ $page->menu_title_ru }}</td></tr>
                        <tr><th>@lang('adminlte.menu_title') En</th><td>{{ $page->menu_title_en }}</td></tr>
                        <tr><th>@lang('adminlte.slug')</th><td>{!! $page->slug !!}</td></tr>
                        <tr><th>@lang('adminlte.description') Uz</th><td>{!! $page->description_uz !!}</td></tr>
                        <tr><th>@lang('adminlte.description') Ru</th><td>{!! $page->description_ru !!}</td></tr>
                        <tr><th>@lang('adminlte.description') En</th><td>{!! $page->description_en !!}</td></tr>
                        <tr><th>@lang('adminlte.body') Uz</th><td>{!! $page->body_uz !!}</td></tr>
                        <tr><th>@lang('adminlte.body') Ru</th><td>{!! $page->body_ru !!}</td></tr>
                        <tr><th>@lang('adminlte.body') En</th><td>{!! $page->body_en !!}</td></tr>
                        <tr>
                            <th>@lang('adminlte.pages.parent')</th>
                            @if($page->parent)
                                <td><a href="{{ route('admin.pages.show', $page->parent) }}">{{ $page->parent->name }}</a></td>
                            @endif
                        </tr>
                        </tbody>
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
                                <td><a href="{{ route('admin.users.show', $page->createdBy) }}">{{ $page->createdBy->name }}</a></td>
                            </tr>
                            <tr>
                                <th>@lang('adminlte.updated_by')</th>
                                <td><a href="{{ route('admin.users.show', $page->updatedBy) }}">{{ $page->updatedBy->name }}</a></td>
                            </tr>
                            <tr><th>@lang('adminlte.created_at')</th><td>{{ $page->created_at }}</td></tr>
                            <tr><th>@lang('adminlte.updated_at')</th><td>{{ $page->updated_at }}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">@lang('adminlte.pages.children')</h3></div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('adminlte.title')</th>
                            <th>@lang('adminlte.menu_title')</th>
                            <th>@lang('adminlte.slug')</th>
                            <th>@lang('adminlte.pages.parent')</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($page->children as $childPage)
                            <tr>
                                <td>
                                    @for ($i = 0; $i < $childPage->depth; $i++) &mdash; @endfor
                                    <a href="{{ route('admin.pages.show', $childPage) }}">{{ $childPage->title }}</a>
                                </td>
                                <td>{{ $childPage->slug }}</td>
                                <td>{{ $childPage->getMenuTitle() }}</td>
                                <td>
                                    @if ($childPage->parent)
                                        <a href="{{ route('admin.pages.show', $childPage) }}">{{ $childPage->parent ? $childPage->parent->title : '' }}</a>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex flex-row">
                                        <form method="POST" action="{{ route('admin.pages.first', $childPage) }}" class="mr-1">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-up"></span></button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.pages.up', $childPage) }}" class="mr-1">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-up"></span></button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.pages.down', $childPage) }}" class="mr-1">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-down"></span></button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.pages.last', $childPage) }}" class="mr-1">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-down"></span></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
