@extends('layouts.app')

@section('template_title')
    {{ $diseaseGroup->name ?? "{{ __('Show') Disease Group" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Disease Group</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('disease-groups.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Disease Group Name:</strong>
                            {{ $diseaseGroup->disease_group_name }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $diseaseGroup->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
