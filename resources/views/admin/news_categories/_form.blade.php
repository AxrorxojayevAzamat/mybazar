<div class="form-group{{ $errors->has('name_ru') ? ' has-error' : '' }}">
    {!! Form::label('name_ru', 'Name RU', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
        {!! Form::text('name_ru', null, ['class' => 'form-control', 'required', 'autofocus']) !!}

        <span class="help-block">
            <strong>{{ $errors->first('name_ru') }}</strong>
        </span>
    </div>
</div>
<div class="form-group{{ $errors->has('name_uz') ? ' has-error' : '' }}">
    {!! Form::label('name_uz', 'Name UZ', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
        {!! Form::text('name_uz', null, ['class' => 'form-control', 'required', 'autofocus']) !!}

        <span class="help-block">
            <strong>{{ $errors->first('name_uz') }}</strong>
        </span>
    </div>
</div>
<div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
    {!! Form::label('name_en', 'Name EN', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
        {!! Form::text('name_en', null, ['class' => 'form-control', 'required', 'autofocus']) !!}

        <span class="help-block">
            <strong>{{ $errors->first('name_en') }}</strong>
        </span>
    </div>
</div>
