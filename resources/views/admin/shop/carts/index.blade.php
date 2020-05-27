@extends('layouts.admin.page')

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
            <th>{{ trans('adminlte.user.name') }}</th>
            <th>{{ trans('adminlte.product.name') }}</th>
            <th>{{ trans('adminlte.modification.name') }}</th>
            <th>{{ trans('adminlte.quantity') }}</th>
            <th>{{ trans('adminlte.created_at') }}</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($carts as $cart)
            <tr>
                <td>
                    @can ('manage-users')
                        <a href="{{ route('admin.users.show', $cart->user) }}">{{ $cart->user->name }}</a>
                    @else
                        {{ $cart->user->name }}
                    @endcan
                </td>
                <td>
                    @can ('manage-shop-products')
                        <a href="{{ route('admin.shop.products.show', $cart->product) }}">{{ $cart->product->name }}</a>
                    @else
                        {{ $cart->product->name }}
                    @endcan
                </td>
                <td>
                    @can ('manage-shop-products')
                        <a href="{{ route('admin.shop.products.modifications.show', $cart->modification) }}">{{ $cart->modification->name }}</a>
                    @else
                        {{ $cart->modification->name }}
                    @endcan
                </td>
                <td>{{ $cart->quantity }}</td>
                <td>{{ $cart->created_at }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $carts->links() }}
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
