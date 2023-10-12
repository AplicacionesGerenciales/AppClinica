<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('date') }}
            {{ Form::text('date', $medicalConsultation->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('diagnostic') }}
            {{ Form::text('diagnostic', $medicalConsultation->diagnostic, ['class' => 'form-control' . ($errors->has('diagnostic') ? ' is-invalid' : ''), 'placeholder' => 'Diagnostic']) }}
            {!! $errors->first('diagnostic', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('symptoms') }}
            {{ Form::text('symptoms', $medicalConsultation->symptoms, ['class' => 'form-control' . ($errors->has('symptoms') ? ' is-invalid' : ''), 'placeholder' => 'Symptoms']) }}
            {!! $errors->first('symptoms', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('doctor_id') }}
            {{ Form::text('doctor_id', $medicalConsultation->doctor_id, ['class' => 'form-control' . ($errors->has('doctor_id') ? ' is-invalid' : ''), 'placeholder' => 'Doctor Id']) }}
            {!! $errors->first('doctor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('file_id') }}
            {{ Form::text('file_id', $medicalConsultation->file_id, ['class' => 'form-control' . ($errors->has('file_id') ? ' is-invalid' : ''), 'placeholder' => 'File Id']) }}
            {!! $errors->first('file_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('disease_id') }}
            {{ Form::text('disease_id', $medicalConsultation->disease_id, ['class' => 'form-control' . ($errors->has('disease_id') ? ' is-invalid' : ''), 'placeholder' => 'Disease Id']) }}
            {!! $errors->first('disease_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('blood_pressure') }}
            {{ Form::text('blood_pressure', $medicalConsultation->blood_pressure, ['class' => 'form-control' . ($errors->has('blood_pressure') ? ' is-invalid' : ''), 'placeholder' => 'Blood Pressure']) }}
            {!! $errors->first('blood_pressure', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('temperature') }}
            {{ Form::text('temperature', $medicalConsultation->temperature, ['class' => 'form-control' . ($errors->has('temperature') ? ' is-invalid' : ''), 'placeholder' => 'Temperature']) }}
            {!! $errors->first('temperature', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('weight') }}
            {{ Form::text('weight', $medicalConsultation->weight, ['class' => 'form-control' . ($errors->has('weight') ? ' is-invalid' : ''), 'placeholder' => 'Weight']) }}
            {!! $errors->first('weight', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>