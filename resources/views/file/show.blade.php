@extends('layouts.app')

@section('template_title')
    {{ $file->name ?? "{{ __('Show') File" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} File</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('files.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>File Number:</strong>
                            {{ $file->file_number }}
                        </div>
                        <div class="form-group">
                            <strong>Message:</strong>
                            {{ $file->message }}
                        </div>
                        <div class="form-group">
                            <strong>Patient Id:</strong>
                            {{ $file->patient_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
