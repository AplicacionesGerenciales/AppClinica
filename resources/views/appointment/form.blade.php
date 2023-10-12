<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('date') }}
            {{ Form::text('date', $appointment->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('comment') }}
            {{ Form::text('comment', $appointment->comment, ['class' => 'form-control' . ($errors->has('comment') ? ' is-invalid' : ''), 'placeholder' => 'Comment']) }}
            {!! $errors->first('comment', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('patient_id') }}
            {{ Form::text('patient_id', $appointment->patient_id, ['class' => 'form-control' . ($errors->has('patient_id') ? ' is-invalid' : ''), 'placeholder' => 'Patient Id']) }}
            {!! $errors->first('patient_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('doctor_id') }}
            {{ Form::text('doctor_id', $appointment->doctor_id, ['class' => 'form-control' . ($errors->has('doctor_id') ? ' is-invalid' : ''), 'placeholder' => 'Doctor Id']) }}
            {!! $errors->first('doctor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('appointment_status_id') }}
            {{ Form::text('appointment_status_id', $appointment->appointment_status_id, ['class' => 'form-control' . ($errors->has('appointment_status_id') ? ' is-invalid' : ''), 'placeholder' => 'Appointment Status Id']) }}
            {!! $errors->first('appointment_status_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>