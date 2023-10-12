@extends('layouts.app')

@section('template_title')
    {{ $statusAppointment->name ?? "{{ __('Show') Status Appointment" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Status Appointment</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('status-appointments.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>State:</strong>
                            {{ $statusAppointment->state }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $statusAppointment->address }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
