@extends('layouts.admin.page')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="sadas">
                        Videos
                        <a href="{{ url('admin/videos/create') }}" class="btn btn-default pull-right">Create New</a>
                    </h2>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Published</th>
                                <th>Poster</th>
                                <th>Video</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->title_ru }}</td>
                                    <td>{!! $post->body_ru !!}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->category->name_ru ?? 'No category' }}</td>
                                    <td>{{ $post->published }}</td>
                                    <td>{{ $post->poster ?? 'No poster' }}</td>
                                    <td>{{ $post->video ?? 'No video' }}</td>
                                    <td>
                                        @if (Auth::user()->is_admin)
                                            @php
                                                if($post->published == 'Yes') {
                                                    $label = 'Draft';
                                                } else {
                                                    $label = 'Publish';
                                                }
                                            @endphp
                                            <a href="{{ url("/admin/videos/{$post->id}/publish") }}" data-method="POST" data-token="{{ csrf_token() }}" data-confirm="Are you sure?" class="btn btn-xs btn-warning">{{ $label }}</a>
                                        @endif
                                        <a href="{{ url("/admin/videos/{$post->id}") }}" class="btn btn-xs btn-success">Show</a>
                                        <a href="{{ url("/admin/videos/{$post->id}/edit") }}" class="btn btn-xs btn-info">Edit</a>
                                            <form method="POST" action="{{ route('admin.videos.destroy', $post) }}" class="mr-1" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-xs btn-danger" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">{{ trans('adminlte.delete') }}</button>
                                            </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No videos available.</td>
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
