@extends('layouts.app')

@section('template_title')
    {{ $schedule->name ?? "{{ __('Show') Schedule" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Schedule</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('schedules.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Day:</strong>
                            {{ $schedule->day }}
                        </div>
                        <div class="form-group">
                            <strong>Start Time:</strong>
                            {{ $schedule->start_time }}
                        </div>
                        <div class="form-group">
                            <strong>Departure Time:</strong>
                            {{ $schedule->departure_time }}
                        </div>
                        <div class="form-group">
                            <strong>Shift:</strong>
                            {{ $schedule->shift }}
                        </div>
                        <div class="form-group">
                            <strong>Doctor Id:</strong>
                            {{ $schedule->doctor_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
