<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('file_number') }}
            {{ Form::text('file_number', $file->file_number, ['class' => 'form-control' . ($errors->has('file_number') ? ' is-invalid' : ''), 'placeholder' => 'File Number']) }}
            {!! $errors->first('file_number', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('message') }}
            {{ Form::text('message', $file->message, ['class' => 'form-control' . ($errors->has('message') ? ' is-invalid' : ''), 'placeholder' => 'Message']) }}
            {!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('patient_id') }}
            {{ Form::text('patient_id', $file->patient_id, ['class' => 'form-control' . ($errors->has('patient_id') ? ' is-invalid' : ''), 'placeholder' => 'Patient Id']) }}
            {!! $errors->first('patient_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>