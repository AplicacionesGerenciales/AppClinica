<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('day') }}
            {{ Form::text('day', $schedule->day, ['class' => 'form-control' . ($errors->has('day') ? ' is-invalid' : ''), 'placeholder' => 'Day']) }}
            {!! $errors->first('day', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('start_time') }}
            {{ Form::text('start_time', $schedule->start_time, ['class' => 'form-control' . ($errors->has('start_time') ? ' is-invalid' : ''), 'placeholder' => 'Start Time']) }}
            {!! $errors->first('start_time', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('departure_time') }}
            {{ Form::text('departure_time', $schedule->departure_time, ['class' => 'form-control' . ($errors->has('departure_time') ? ' is-invalid' : ''), 'placeholder' => 'Departure Time']) }}
            {!! $errors->first('departure_time', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('shift') }}
            {{ Form::text('shift', $schedule->shift, ['class' => 'form-control' . ($errors->has('shift') ? ' is-invalid' : ''), 'placeholder' => 'Shift']) }}
            {!! $errors->first('shift', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('doctor_id') }}
            {{ Form::text('doctor_id', $schedule->doctor_id, ['class' => 'form-control' . ($errors->has('doctor_id') ? ' is-invalid' : ''), 'placeholder' => 'Doctor Id']) }}
            {!! $errors->first('doctor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>