@extends('layouts.app')

@section('template_title')
    {{ $disease->name ?? "{{ __('Show') Disease" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Disease</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('diseases.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $disease->name }}
                        </div>
                        <div class="form-group">
                            <strong>Disease Group Id:</strong>
                            {{ $disease->disease_group_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
