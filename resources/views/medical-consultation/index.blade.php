@extends('layouts.panel')

@section('template_title')
    Medical Consultation
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Medical Consultation') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('medical-consultations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Date</th>
										<th>Diagnostic</th>
										<th>Symptoms</th>
										<th>Doctor Id</th>
										<th>File Id</th>
										<th>Disease Id</th>
										<th>Blood Pressure</th>
										<th>Temperature</th>
										<th>Weight</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medicalConsultations as $medicalConsultation)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $medicalConsultation->date }}</td>
											<td>{{ $medicalConsultation->diagnostic }}</td>
											<td>{{ $medicalConsultation->symptoms }}</td>
											<td>{{ $medicalConsultation->doctor_id }}</td>
											<td>{{ $medicalConsultation->file_id }}</td>
											<td>{{ $medicalConsultation->disease_id }}</td>
											<td>{{ $medicalConsultation->blood_pressure }}</td>
											<td>{{ $medicalConsultation->temperature }}</td>
											<td>{{ $medicalConsultation->weight }}</td>

                                            <td>
                                                <form action="{{ route('medical-consultations.destroy',$medicalConsultation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('medical-consultations.show',$medicalConsultation->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('medical-consultations.edit',$medicalConsultation->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $medicalConsultations->links() !!}
            </div>
        </div>
    </div>
@endsection
