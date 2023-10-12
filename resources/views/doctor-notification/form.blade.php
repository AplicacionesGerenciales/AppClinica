<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('shipment_date') }}
            {{ Form::text('shipment_date', $doctorNotification->shipment_date, ['class' => 'form-control' . ($errors->has('shipment_date') ? ' is-invalid' : ''), 'placeholder' => 'Shipment Date']) }}
            {!! $errors->first('shipment_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('message') }}
            {{ Form::text('message', $doctorNotification->message, ['class' => 'form-control' . ($errors->has('message') ? ' is-invalid' : ''), 'placeholder' => 'Message']) }}
            {!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('doctor_id') }}
            {{ Form::text('doctor_id', $doctorNotification->doctor_id, ['class' => 'form-control' . ($errors->has('doctor_id') ? ' is-invalid' : ''), 'placeholder' => 'Doctor Id']) }}
            {!! $errors->first('doctor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>