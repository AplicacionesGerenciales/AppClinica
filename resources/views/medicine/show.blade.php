@extends('layouts.app')

@section('template_title')
    {{ $medicine->name ?? "{{ __('Show') Medicine" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Medicine</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('medicines.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $medicine->name }}
                        </div>
                        <div class="form-group">
                            <strong>Presentation:</strong>
                            {{ $medicine->presentation }}
                        </div>
                        <div class="form-group">
                            <strong>Typemedication:</strong>
                            {{ $medicine->typeMedication }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
