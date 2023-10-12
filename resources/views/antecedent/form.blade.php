<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('antecedent_description') }}
            {{ Form::text('antecedent_description', $antecedent->antecedent_description, ['class' => 'form-control' . ($errors->has('antecedent_description') ? ' is-invalid' : ''), 'placeholder' => 'Antecedent Description']) }}
            {!! $errors->first('antecedent_description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('file_id') }}
            {{ Form::text('file_id', $antecedent->file_id, ['class' => 'form-control' . ($errors->has('file_id') ? ' is-invalid' : ''), 'placeholder' => 'File Id']) }}
            {!! $errors->first('file_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>