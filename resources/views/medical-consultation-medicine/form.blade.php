<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('dosage') }}
            {{ Form::text('dosage', $medicalConsultationMedicine->dosage, ['class' => 'form-control' . ($errors->has('dosage') ? ' is-invalid' : ''), 'placeholder' => 'Dosage']) }}
            {!! $errors->first('dosage', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('medical_consultation_id') }}
            {{ Form::text('medical_consultation_id', $medicalConsultationMedicine->medical_consultation_id, ['class' => 'form-control' . ($errors->has('medical_consultation_id') ? ' is-invalid' : ''), 'placeholder' => 'Medical Consultation Id']) }}
            {!! $errors->first('medical_consultation_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('medicine_id') }}
            {{ Form::text('medicine_id', $medicalConsultationMedicine->medicine_id, ['class' => 'form-control' . ($errors->has('medicine_id') ? ' is-invalid' : ''), 'placeholder' => 'Medicine Id']) }}
            {!! $errors->first('medicine_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>