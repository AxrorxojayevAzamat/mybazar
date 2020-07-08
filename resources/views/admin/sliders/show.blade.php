@extends('layouts.admin.page')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        ID: {{ $post->id }}

                        <a href="{{ url('admin/sliders') }}" class="btn btn-default pull-right">Go Back</a>
                    </h2>
                </div>
                <div class="panel-body">
                    <p><strong>Photo: </strong>
                        @if($post->file)
                            <img src="/storage/sliders/{{$post->file}}">
                        @else
                        <p>No photo</p>
                        @endif
                    </p>
                </div>
            </div>
        </div>

    </div>
@endsection
