@extends('layouts.admin.page')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Sliders

                        <a href="{{ url('admin/sliders/create') }}" class="btn btn-default pull-right">Create New</a>
                    </h2>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>URL</th>
                                <th>Sort</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->url }}</td>
                                    <td>{{ $post->sort }}</td>
                                    <td>{{ $post->file ?? 'No photo' }}</td>
                                    <td>
                                        @if (Auth::user()->is_admin)
                                            @php
                                                if($post->published == 'Yes') {
                                                    $label = 'Draft';
                                                } else {
                                                    $label = 'Publish';
                                                }
                                            @endphp
                                            <a href="{{ url("/admin/sliders/{$post->id}/publish") }}" data-method="POST" data-token="{{ csrf_token() }}" data-confirm="Are you sure?" class="btn btn-xs btn-warning">{{ $label }}</a>
                                        @endif
                                        <a href="{{ url("/admin/sliders/{$post->id}") }}" class="btn btn-xs btn-success">Show</a>
                                        <a href="{{ url("/admin/sliders/{$post->id}/edit") }}" class="btn btn-xs btn-info">Edit</a>
                                            <form method="POST" action="{{ route('admin.sliders.destroy', $post) }}" class="mr-1" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-xs btn-danger" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">{{ trans('adminlte.delete') }}</button>
                                            </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No news available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {!! $posts->links() !!}

                </div>
            </div>
        </div>

    </div>
@endsection
