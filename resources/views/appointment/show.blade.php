@extends('layouts.app')

@section('template_title')
    {{ $appointment->name ?? "{{ __('Show') Appointment" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Appointment</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('appointments.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $appointment->date }}
                        </div>
                        <div class="form-group">
                            <strong>Comment:</strong>
                            {{ $appointment->comment }}
                        </div>
                        <div class="form-group">
                            <strong>Patient Id:</strong>
                            {{ $appointment->patient_id }}
                        </div>
                        <div class="form-group">
                            <strong>Doctor Id:</strong>
                            {{ $appointment->doctor_id }}
                        </div>
                        <div class="form-group">
                            <strong>Appointment Status Id:</strong>
                            {{ $appointment->appointment_status_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
