@extends('layouts.app')

@section('template_title')
    {{ $doctor->name ?? "{{ __('Show') Doctor" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Doctor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('doctors.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $doctor->name }}
                        </div>
                        <div class="form-group">
                            <strong>Lastname:</strong>
                            {{ $doctor->lastname }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $doctor->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Identity Card:</strong>
                            {{ $doctor->identity_card }}
                        </div>
                        <div class="form-group">
                            <strong>Gender:</strong>
                            {{ $doctor->gender }}
                        </div>
                        <div class="form-group">
                            <strong>Inss:</strong>
                            {{ $doctor->inss }}
                        </div>
                        <div class="form-group">
                            <strong>Specialty Id:</strong>
                            {{ $doctor->specialty_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $doctor->user_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
