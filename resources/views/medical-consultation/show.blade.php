@extends('layouts.app')

@section('template_title')
    {{ $medicalConsultation->name ?? "{{ __('Show') Medical Consultation" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Medical Consultation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('medical-consultations.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $medicalConsultation->date }}
                        </div>
                        <div class="form-group">
                            <strong>Diagnostic:</strong>
                            {{ $medicalConsultation->diagnostic }}
                        </div>
                        <div class="form-group">
                            <strong>Symptoms:</strong>
                            {{ $medicalConsultation->symptoms }}
                        </div>
                        <div class="form-group">
                            <strong>Doctor Id:</strong>
                            {{ $medicalConsultation->doctor_id }}
                        </div>
                        <div class="form-group">
                            <strong>File Id:</strong>
                            {{ $medicalConsultation->file_id }}
                        </div>
                        <div class="form-group">
                            <strong>Disease Id:</strong>
                            {{ $medicalConsultation->disease_id }}
                        </div>
                        <div class="form-group">
                            <strong>Blood Pressure:</strong>
                            {{ $medicalConsultation->blood_pressure }}
                        </div>
                        <div class="form-group">
                            <strong>Temperature:</strong>
                            {{ $medicalConsultation->temperature }}
                        </div>
                        <div class="form-group">
                            <strong>Weight:</strong>
                            {{ $medicalConsultation->weight }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
