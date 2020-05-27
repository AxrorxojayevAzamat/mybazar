@extends('layouts.admin.page')

@section('content')
    <p><a href="{{ route('admin.deliveries.create') }}" class="btn btn-success">{{ trans('adminlte.delivery.add') }}</a></p>

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
            <th>{{ trans('adminlte.name') }}</th>
            <th>{{ trans('adminlte.cost') }}</th>
            <th>{{ trans('adminlte.delivery.min_weight') }}</th>
            <th>{{ trans('adminlte.delivery.max_weight') }}</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($deliveries as $delivery)
            <tr>
                <td><a href="{{ route('admin.deliveries.show', $delivery) }}">{{ $delivery->name }}</a></td>
                <td>{{ $delivery->cost }}</td>
                <td>{{ $delivery->min_weight }}</td>
                <td>{{ $delivery->max_weight }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $deliveries->links() }}
@endsection
