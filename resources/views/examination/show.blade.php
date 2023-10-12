@extends('layouts.app')

@section('template_title')
    {{ $examination->name ?? "{{ __('Show') Examination" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Examination</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('examinations.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Result:</strong>
                            {{ $examination->result }}
                        </div>
                        <div class="form-group">
                            <strong>Type Examination Id:</strong>
                            {{ $examination->type_examination_id }}
                        </div>
                        <div class="form-group">
                            <strong>Medical Consultation Id:</strong>
                            {{ $examination->medical_consultation_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
