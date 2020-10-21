@extends('layouts.admin.page')

@php($isAdmin = Auth::user()->isAdmin())

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        <a href="{{ route('admin.discounts.create') }}" class="btn btn-default pull-right">{{ trans('adminlte.create') }}</a>
                    </h2>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ trans('adminlte.image') }}</th>
                                <th>{{ trans('adminlte.name') }}</th>
                                <th>{{ trans('adminlte.description') }}</th>
                                <th>{{ trans('adminlte.author') }}</th>
                                <th>{{ trans('adminlte.category.name') }}</th>
                                <th>{{ trans('adminlte.common') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($discounts as $discount)
                            <tr>
                                <td>
                                    @if ($discount->photo)
                                        <a href="{{ $discount->photoOriginal }}" target="_blank"><img src="{{ $discount->photoThumbnail }}" alt=""></a>
                                    @endif
                                </td>
                                <td><a href="{{ route('admin.discounts.show', $discount) }}">{{ $discount->name }}</a></td>
                                <td>{!! $discount->description !!}</td>
                                <td>
                                    @if ($isAdmin)
                                        <a href="{{ route('admin.users.show', $discount->createdBy) }}">{{ $discount->createdBy->name }}</a>
                                    @else
                                        {{ $discount->createdBy->name }}
                                    @endif
                                </td>
                                <td><a href="{{ route('admin.blog.categories.show', $discount->category) }}">{{ $discount->category->name }}</a></td>
                                <td>{!! $discount->commoned !!}</td>
                                <td>
                                    @if ($isAdmin)
                                        @if ($discount->common)
                                            <a href="{{ route('admin.discounts.rared', $discount) }}" data-method="POST" data-token="{{ csrf_token() }}"
                                               data-confirm="Are you sure?" class="btn btn-xs btn-warning">Rared</a>
                                        @else
                                            <a href="{{ route('admin.discounts.common', $discount) }}" data-method="POST" data-token="{{ csrf_token() }}"
                                               data-confirm="Are you sure?" class="btn btn-xs btn-warning">Common</a>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    {!! $discounts->links() !!}
                </div>
            </div>
        </div>

    </div>
@endsection
