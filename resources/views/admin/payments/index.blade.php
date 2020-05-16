@extends('layouts.page')

@section('content')
    <p><a href="{{ route('admin.payments.create') }}" class="btn btn-success">{{ trans('adminlte.payment.add') }}</a></p>

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
            <th>Logo</th>
            <th>{{ trans('adminlte.name') }}</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($payments as $payment)
            <tr>
                <td>
                    @if ($payment->logo)
                        <a href="{{ $payment->logoOriginal }}" target="_blank"><img src="{{ $payment->logoThumbnail }}"></a>
                    @endif
                </td>
                <td><a href="{{ route('admin.payments.show', $payment) }}">{{ $payment->name }}</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $payments->links() }}
@endsection
