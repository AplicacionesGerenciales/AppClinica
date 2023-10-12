@extends('layouts.app')

@section('template_title')
    {{ $medicalConsultationMedicine->name ?? "{{ __('Show') Medical Consultation Medicine" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Medical Consultation Medicine</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('medical-consultation-medicines.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Dosage:</strong>
                            {{ $medicalConsultationMedicine->dosage }}
                        </div>
                        <div class="form-group">
                            <strong>Medical Consultation Id:</strong>
                            {{ $medicalConsultationMedicine->medical_consultation_id }}
                        </div>
                        <div class="form-group">
                            <strong>Medicine Id:</strong>
                            {{ $medicalConsultationMedicine->medicine_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
