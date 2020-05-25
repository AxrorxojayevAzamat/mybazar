@extends('layouts.page')

@if (!config('adminlte.enabled_laravel_mix'))
    @php($cssSectionName = 'css')
    @php($javaScriptSectionName = 'js')
@else
    @php($cssSectionName = 'mix_adminlte_css')
    @php($javaScriptSectionName = 'mix_adminlte_js')
@endif

@section($cssSectionName)
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <div class='input-group date' id='date_from'>
                                {!! Form::text('date_from', request('date_from'), ['class' => 'form-control', 'placeholder' => trans('adminlte.date_from')]) !!}
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                    -
                    <div class="col-sm-2">
                        <div class="form-group">
                            <div class='input-group date' id='date_to'>
                                {!! Form::text('date_to', request('date_to'), ['class' => 'form-control', 'placeholder' => trans('adminlte.date_to')]) !!}
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
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
            <th>ID</th>
            <th>{{ trans('adminlte.user.name') }}</th>
            <th>{{ trans('adminlte.delivery.name') }}</th>
            <th>{{ trans('adminlte.payment.name') }}</th>
            <th>{{ trans('adminlte.cost') }}</th>
            <th>{{ trans('adminlte.status') }}</th>
            <th>{{ trans('adminlte.created_at') }}</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($orders as $order)
            <tr>
                <td>
                    @can ('manage-users')
                        <a href="{{ route('admin.users.show', $order->user) }}">{{ $order->user->name }}</a>
                    @else
                        {{ $order->user->name }}
                    @endcan
                </td>
                <td>{{ $order->delivery_method_name }}</td>
                <td>
                    @can ('manage-payments')
                        <a href="{{ route('admin.payments.show', $order->payment) }}">{{ $order->payment->name }}</a>
                    @else
                        {{ $order->payment->name }}
                    @endcan
                </td>
                <td>{{ $order->cost }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->created_at }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $orders->links() }}
@endsection

@section($javaScriptSectionName)
    <script type="text/javascript" src="{{ asset("vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("vendor/bootstrap-datepicker/dist/locales/bootstrap-datepicker.ru.min.js") }}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#date_from').datepicker({
                format: 'yyyy-mm-dd',
                autoclose:true,
                language: 'ru',
                todayHighlight: true,
            });
            $('#date_to').datepicker({
                format: 'yyyy-mm-dd',
                autoclose:true,
                language: 'ru',
                todayHighlight: true,
            });
        });

    </script>
@endsection
