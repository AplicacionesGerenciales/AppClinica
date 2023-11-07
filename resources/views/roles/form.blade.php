<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('roles') }}
            {{ Form::text('roles', $roles->roles, ['class' => 'form-control' . ($errors->has('roles') ? ' is-invalid' : ''), 'placeholder' => 'roles']) }}
            {!! $errors->first('usuarios', '<div class="invalid-feedback">:message</div>') !!}
        </div>
      

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>