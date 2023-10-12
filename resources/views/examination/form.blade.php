<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('result') }}
            {{ Form::text('result', $examination->result, ['class' => 'form-control' . ($errors->has('result') ? ' is-invalid' : ''), 'placeholder' => 'Result']) }}
            {!! $errors->first('result', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type_examination_id') }}
            {{ Form::text('type_examination_id', $examination->type_examination_id, ['class' => 'form-control' . ($errors->has('type_examination_id') ? ' is-invalid' : ''), 'placeholder' => 'Type Examination Id']) }}
            {!! $errors->first('type_examination_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('medical_consultation_id') }}
            {{ Form::text('medical_consultation_id', $examination->medical_consultation_id, ['class' => 'form-control' . ($errors->has('medical_consultation_id') ? ' is-invalid' : ''), 'placeholder' => 'Medical Consultation Id']) }}
            {!! $errors->first('medical_consultation_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>