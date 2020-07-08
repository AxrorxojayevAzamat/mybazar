<div class="card card-green card-outline">
    <div class="card-body">
        <div class="form-group{{ $errors->has('sort') ? ' has-error' : '' }}">
            {!! Form::label('sort', 'Sort', ['class' => 'col-md-2 control-label']) !!}

            <div class="col-md-8">
                {!! Form::text('sort', null, ['class' => 'form-control', 'required']) !!}

                <span class="help-block">
                    <strong>{{ $errors->first('sort') }}</strong>
                </span>
            </div>
        </div>

        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
            {!! Form::label('url', 'Url', ['class' => 'col-md-2 control-label']) !!}

            <div class="col-md-8">
                {!! Form::text('url', null, ['class' => 'form-control', 'required']) !!}

                <span class="help-block">
                    <strong>{{ $errors->first('url') }}</strong>
                </span>
            </div>
        </div>

        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
            {!! Form::label('file', 'File', ['class' => 'col-md-2 control-label']) !!}

            <div class="col-md-8">
                {!! Form::file('file', ['accept' => '.jpg,.png', 'required',  'class' => 'form-control hidden', 'id'=>'file']) !!}

                <span class="help-block">
            <strong>{{ $errors->first('file') }}</strong>
        </span>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
