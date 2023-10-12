@extends('layouts.app')

@section('template_title')
    {{ $antecedent->name ?? "{{ __('Show') Antecedent" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Antecedent</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('antecedents.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Antecedent Description:</strong>
                            {{ $antecedent->antecedent_description }}
                        </div>
                        <div class="form-group">
                            <strong>File Id:</strong>
                            {{ $antecedent->file_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
