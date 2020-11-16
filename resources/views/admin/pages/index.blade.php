@extends('layouts.admin.page')

@section('content')
    <div class="row">
        <p><a href="{{ route('admin.pages.create') }}" class="btn btn-success">@lang('adminlte.pages.add')</a></p>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
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

                        @foreach ($pages as $page)
                            <tr>
                                <td>
                                    @for ($i = 0; $i < $page->depth; $i++) &mdash; @endfor
                                    <a href="{{ route('admin.pages.show', $page) }}">{{ $page->title }}</a>
                                </td>
                                <td>{{ $page->slug }}</td>
                                <td>{{ $page->getMenuTitle() }}</td>
                                <td>
                                    @if ($page->parent)
                                        <a href="{{ route('admin.pages.show', $page) }}">{{ $page->parent ? $page->parent->title : '' }}</a>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex flex-row">
                                        <form method="POST" action="{{ route('admin.pages.first', $page) }}" class="mr-1">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-up"></span></button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.pages.up', $page) }}" class="mr-1">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-up"></span></button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.pages.down', $page) }}" class="mr-1">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-down"></span></button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.pages.last', $page) }}" class="mr-1">
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
