@extends('layouts.admin.page')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.discounts.edit', $discount) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>

        @if (Auth::user()->isAdmin())
            <form method="POST" action="{{ route($discount->common ? 'admin.discounts.rared' : 'admin.discounts.common', $discount) }}" class="mr-1">
                @csrf
                <button class="btn{{ $discount->common ? ' btn-warning' : ' btn-success' }}"
                        onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">
                    {{ trans($discount->common ? 'adminlte.commoned' : 'adminlte.rared') }}
                </button>
            </form>
        @endif

        <form method="POST" action="{{ route('admin.discounts.destroy', $discount) }}" class="mr-1">
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
                        <tr><th>ID</th><td>{{ $discount->id }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Uz</th><td>{{ $discount->name_uz }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Ru</th><td>{{ $discount->name_ru }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} En</th><td>{{ $discount->name_en }}</td></tr>
                        <tr><th>{{ trans('adminlte.description') }} Uz</th><td>{!! $discount->description_uz !!}</td></tr>
                        <tr><th>{{ trans('adminlte.description') }} Ru</th><td>{!! $discount->description_ru !!}</td></tr>
                        <tr><th>{{ trans('adminlte.description') }} En</th><td>{!! $discount->description_en !!}</td></tr>
                        <tr><th>{{ trans('adminlte.date_from') }}</th><td>{{ $discount->start_date }}</td></tr>
                        <tr><th>{{ trans('adminlte.date_to') }}</th><td>{{ $discount->end_date }}</td></tr>
                        <tr>
                            <th>{{ trans('adminlte.category.name') }}</th>
                            <td><a href="{{ route('admin.categories.show', $discount->category) }}"></a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.common') }}</th>
                            <td>{!! $discount->commoned !!}</td>
                        </tr>
                        <tr><th>{{ trans('adminlte.status') }}</th><td>{!! \App\Entity\Discount::getStatusLabel($discount->status) !!}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">Photo</h3></div>
                <div class="card-body">
                    <table class="table table-striped projects">
                        <tbody>
                        <tr>
                            <th>{{ trans('adminlte.image') }}</th>
                            <td>
                                @if ($discount->photo)
                                    <a href="{{ $discount->photoOriginal }}" target="_blank"><img src="{{ $discount->photoThumbnail }}"></a>
                                @endif
                            </td>
                        </tr>

                    </table>
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
                                <td><a href="{{ route('admin.users.show', $discount->createdBy) }}">{{ $discount->createdBy->name }}</a></td>
                            </tr>
                            <tr>
                                <th>{{ trans('adminlte.updated_by') }}</th>
                                <td><a href="{{ route('admin.users.show', $discount->updatedBy) }}">{{ $discount->updatedBy->name }}</a></td>
                            </tr>
                            <tr><th>{{ trans('adminlte.created_at') }}</th><td>{{ $discount->created_at }}</td></tr>
                            <tr><th>{{ trans('adminlte.updated_at') }}</th><td>{{ $discount->updated_at }}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
