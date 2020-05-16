@extends('layouts.page')

@section('content')
    <p><a href="{{ route('admin.shop.marks.create') }}" class="btn btn-success">{{ trans('adminlte.mark.add') }}</a></p>

    <div class="card mb-4">
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            {!! Form::text('name', request('name'), ['class'=>'form-control', 'placeholder' => trans('adminlte.name')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ trans('adminlte.search') }}</button>
                            <a href="?" class="btn btn-outline-secondary">{{ trans('adminlte.clear') }}</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>{{ trans('adminlte.photo.name') }}</th>
            <th>{{ trans('adminlte.name') }}</th>
            <th>Slug</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($marks as $mark)
            <tr>
                <td>
                    @if ($mark->photo)
                        <a href="{{ $mark->photoOriginal }}" target="_blank"><img src="{{ $mark->photoThumbnail }}"></a>
                    @endif
                </td>
                <td><a href="{{ route('admin.shop.marks.show', $mark) }}">{{ $mark->name }}</a></td>
                <td>{{ $mark->slug }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $marks->links() }}
@endsection
