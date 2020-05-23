@extends('layouts.page')

@section('content')
    <div class="d-flex flex-row mb-3">
        <form method="POST" action="{{ route('admin.shop.products.reviews.destroy', ['product' => $product, 'review' => $review]) }}" class="mr-1">
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
                        <tr><th>{{ trans('adminlte.rating') }}</th><td>{{ $review->rating }}</td></tr>
                        <tr><th>{{ trans('adminlte.comment') }}</th><td>{{ $review->comment }}</td></tr>
                        <tr><th>{{ trans('adminlte.reviewer') }}</th><td>{{ $review->user->name }}</td></tr>
                        <tr><th>{{ trans('adminlte.reviewed_at') }}</th><td>{{ $review->created_at }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_at') }}</th><td>{{ $review->updated_at }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
