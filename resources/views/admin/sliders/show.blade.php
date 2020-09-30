@extends('layouts.admin.page')

@section('content')
<div class="d-flex flex-row mb-3">
    <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>

    <form method="POST" action="{{ route('admin.sliders.destroy', $slider) }}" class="mr-1">
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
                        <tr><th>ID</th><td>{{ $slider->id }}</td></tr>
                        <tr><th>{{ trans('adminlte.url') }}</th><td>{!! $slider->url !!}</td></tr>
                        <tr><th>{{ trans('adminlte.sort') }}</th><td>{!! $slider->sort !!}</td></tr>
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
                @if ($slider->file)
                <a href="{{ $slider->fileOriginal }}" target="_blank"><img src="{{ $slider->fileThumbnail }}"></a>
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
                            <td><a href="{{ route('admin.users.show', $slider->createdBy) }}">{{ $slider->createdBy->name }}</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.updated_by') }}</th>
                            <td><a href="{{ route('admin.users.show', $slider->updatedBy) }}">{{ $slider->updatedBy->name }}</a></td>
                        </tr>
                        <tr><th>{{ trans('adminlte.created_at') }}</th><td>{{ $slider->created_at }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_at') }}</th><td>{{ $slider->updated_at }}</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
