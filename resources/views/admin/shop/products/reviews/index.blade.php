@extends('layouts.page')

@section('content')
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>{{ trans('adminlte.reviewer') }}</th>
            <th>{{ trans('adminlte.rating') }}</th>
            <th>{{ trans('adminlte.comment') }}</th>
            <th>{{ trans('adminlte.reviewed_at') }}</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($reviews as $review)
            <tr>
                <td>
                    @can ('manage-users')
                        <a href="{{ route('admin.users.show', $review->user) }}">{{ $review->user->name }}</a>
                    @else
                        {{ $review->user->name }}
                    @endcan
                </td>
                <td>{{ $review->rating }}</td>
                <td>{{ $review->comment }}</td>
                <td>{{ $review->created_at }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $reviews->links() }}
@endsection
