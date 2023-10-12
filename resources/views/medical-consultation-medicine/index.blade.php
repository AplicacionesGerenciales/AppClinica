@extends('layouts.app')

@section('template_title')
    Medical Consultation Medicine
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Medical Consultation Medicine') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('medical-consultation-medicines.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Dosage</th>
										<th>Medical Consultation Id</th>
										<th>Medicine Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medicalConsultationMedicines as $medicalConsultationMedicine)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $medicalConsultationMedicine->dosage }}</td>
											<td>{{ $medicalConsultationMedicine->medical_consultation_id }}</td>
											<td>{{ $medicalConsultationMedicine->medicine_id }}</td>

                                            <td>
                                                <form action="{{ route('medical-consultation-medicines.destroy',$medicalConsultationMedicine->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('medical-consultation-medicines.show',$medicalConsultationMedicine->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('medical-consultation-medicines.edit',$medicalConsultationMedicine->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $medicalConsultationMedicines->links() !!}
            </div>
        </div>
    </div>
@endsection
