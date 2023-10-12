<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('disease_group_name') }}
            {{ Form::text('disease_group_name', $diseaseGroup->disease_group_name, ['class' => 'form-control' . ($errors->has('disease_group_name') ? ' is-invalid' : ''), 'placeholder' => 'Disease Group Name']) }}
            {!! $errors->first('disease_group_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $diseaseGroup->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>