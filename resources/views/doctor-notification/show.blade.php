@extends('layouts.app')

@section('template_title')
    {{ $doctorNotification->name ?? "{{ __('Show') Doctor Notification" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Doctor Notification</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('doctor-notifications.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Shipment Date:</strong>
                            {{ $doctorNotification->shipment_date }}
                        </div>
                        <div class="form-group">
                            <strong>Message:</strong>
                            {{ $doctorNotification->message }}
                        </div>
                        <div class="form-group">
                            <strong>Doctor Id:</strong>
                            {{ $doctorNotification->doctor_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
