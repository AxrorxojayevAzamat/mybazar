@extends('layouts.admin.page')

@php($isAdmin = Auth::user()->isAdmin())

@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>
                    {{ trans('adminlte.sliders.slider') }}<br>

                    <a href="{{ route('admin.sliders.create') }}" class="btn btn-success pull-right">{{ trans('adminlte.sliders.create new slider') }}</a>
                </h2>
            </div>

            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ trans('adminlte.image') }}</th>
                            <th>{{ trans('adminlte.url') }}</th>
                            <th>{{ trans('adminlte.author') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sliders as $slider)
                        <tr>
                            <td>
                                @if ($slider->file)
                                <a href="{{ $slider->fileOriginal }}" target="_blank"><img src="{{ $slider->fileThumbnail }}" alt=""></a>
                                @endif
                            </td>
                            <td><a href="{{ route('admin.sliders.show', $slider) }}">{{ $slider->url }}</a></td>
                            <td>
                                @if ($isAdmin)
                                <a href="{{ route('admin.users.show', $slider->createdBy) }}">{{ $slider->createdBy->name }}</a>
                                @else
                                {{ $slider->createdBy->name }}
                                @endif
                            </td>
                            <td>
                    <div class="d-flex flex-row">
                        <form method="POST" action="{{ route('admin.sliders.first', $slider) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-up"></span></button>
                        </form>
                        <form method="POST" action="{{ route('admin.sliders.up', $slider) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-up"></span></button>
                        </form>
                        <form method="POST" action="{{ route('admin.sliders.down', $slider) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-down"></span></button>
                        </form>
                        <form method="POST" action="{{ route('admin.sliders.last', $slider) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-down"></span></button>
                        </form>
                    </div>
                </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">No news available.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
