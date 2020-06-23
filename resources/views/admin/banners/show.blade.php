@extends('layouts.admin.page')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Title: {{ $post->title_ru }}

                        <a href="{{ url('admin/banners') }}" class="btn btn-default pull-right">Go Back</a>
                    </h2>
                </div>
                <div class="panel-body">
                    <p><strong>Body: </strong>{{ $post->body_ru }}</p>
                </div>
            </div>
        </div>

    </div>
@endsection
