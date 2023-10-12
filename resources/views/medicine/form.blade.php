<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $medicine->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('presentation') }}
            {{ Form::text('presentation', $medicine->presentation, ['class' => 'form-control' . ($errors->has('presentation') ? ' is-invalid' : ''), 'placeholder' => 'Presentation']) }}
            {!! $errors->first('presentation', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('typeMedication') }}
            {{ Form::text('typeMedication', $medicine->typeMedication, ['class' => 'form-control' . ($errors->has('typeMedication') ? ' is-invalid' : ''), 'placeholder' => 'Typemedication']) }}
            {!! $errors->first('typeMedication', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>