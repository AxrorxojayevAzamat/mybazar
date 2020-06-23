<ul class="nav nav-tabs mb-3">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#uzbek">O'zbekcha</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#russian">Ruscha</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#english">Inglizcha</a>
    </li>
</ul>
<div class="card card-primary card-outline">
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="uzbek" role="tabpanel">
                <div class="form-group{{ $errors->has('title_uz') ? ' has-error' : '' }}">
                    {!! Form::label('title_uz', 'Title', ['class' => 'col-md-2 control-label']) !!}

                    <div class="col-md-8">
                        {!! Form::text('title_uz', null, ['class' => 'form-control', 'required', 'autofocus']) !!}

                        <span class="help-block">
                            <strong>{{ $errors->first('title_uz') }}</strong>
                        </span>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('description_uz') ? ' has-error' : '' }}">
                    {!! Form::label('description_uz', 'Description', ['class' => 'col-md-2 control-label']) !!}

                    <div class="col-md-8">
                        {!! Form::text('description_uz', null, ['class' => 'form-control', 'required', 'autofocus']) !!}

                        <span class="help-block">
                            <strong>{{ $errors->first('description_uz') }}</strong>
                        </span>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="russian" role="tabpanel">
                <div class="form-group{{ $errors->has('title_ru') ? ' has-error' : '' }}">
                    {!! Form::label('title_ru', 'Title', ['class' => 'col-md-2 control-label']) !!}

                    <div class="col-md-8">
                        {!! Form::text('title_ru', null, ['class' => 'form-control', 'required', 'autofocus']) !!}

                        <span class="help-block">
                            <strong>{{ $errors->first('title_ru') }}</strong>
                        </span>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('description_ru') ? ' has-error' : '' }}">
                    {!! Form::label('description_ru', 'Description', ['class' => 'col-md-2 control-label']) !!}

                    <div class="col-md-8">
                        {!! Form::text('description_ru', null, ['class' => 'form-control', 'required', 'autofocus']) !!}

                        <span class="help-block">
                            <strong>{{ $errors->first('description_ru') }}</strong>
                        </span>
                    </div>
                </div>

            </div>
            <div class="tab-pane" id="english" role="tabpanel">
                <div class="form-group{{ $errors->has('title_en') ? ' has-error' : '' }}">
                    {!! Form::label('title_en', 'Title', ['class' => 'col-md-2 control-label']) !!}

                    <div class="col-md-8">
                        {!! Form::text('title_en', null, ['class' => 'form-control', 'required', 'autofocus']) !!}

                        <span class="help-block">
                            <strong>{{ $errors->first('title_en') }}</strong>
                        </span>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('description_en') ? ' has-error' : '' }}">
                    {!! Form::label('description_en', 'Description', ['class' => 'col-md-2 control-label']) !!}

                    <div class="col-md-8">
                        {!! Form::text('description_en', null, ['class' => 'form-control', 'required', 'autofocus']) !!}

                        <span class="help-block">
                            <strong>{{ $errors->first('description_en') }}</strong>
                        </span>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


<div class="card card-green card-outline">
    <div class="card-body">

        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
            {!! Form::label('slug', 'Slug', ['class' => 'col-md-2 control-label']) !!}

            <div class="col-md-8">
                {!! Form::text('slug', null, ['class' => 'form-control', 'required']) !!}

                <span class="help-block">
                    <strong>{{ $errors->first('slug') }}</strong>
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


        <div class="form-group{{ $errors->has('is_published') ? ' has-error' : '' }}">
            {!! Form::label('is_published', 'Status', ['class' => 'col-md-2 control-label']) !!}

            <div class="col-md-8">
                <select class="form-control" name="is_published" id="active">
                    <option value="1" @if (old('active') == 1) selected @endif>On</option>
                    <option value="0">Off</option>
                </select>

                <span class="help-block">
            <strong>{{ $errors->first('is_published') }}</strong>
        </span>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('body_ru');
    CKEDITOR.replace('body_uz');
    CKEDITOR.replace('body_en');
</script>
