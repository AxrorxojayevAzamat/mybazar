@extends('layouts.admin.page')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Video Categories

                        <a href="{{ url('admin/videos-categories/create') }}" class="btn btn-default pull-right">Create New</a>
                    </h2>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>News Count</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->name_ru }}</td>
                                    <td>{{ $category->posts_count }}</td>
                                    <td>
                                        <a href="{{ url("/admin/videos-categories/{$category->id}/edit") }}" class="btn btn-xs btn-info">Edit</a>
                                        <form method="POST" action="{{ route('admin.videos-categories.destroy', $category) }}" class="mr-1" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-xs btn-danger" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">{{ trans('adminlte.delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">No category available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {!! $categories->links() !!}

                </div>
            </div>
        </div>

    </div>
@endsection
