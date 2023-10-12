@extends('layouts.panel')

@section('template_title')
    Appointment
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Appointment') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('appointments.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Comment</th>
										<th>Patient Id</th>
										<th>Doctor Id</th>
										<th>Appointment Status Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $appointment)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $appointment->date }}</td>
											<td>{{ $appointment->comment }}</td>
											<td>{{ $appointment->patient_id }}</td>
											<td>{{ $appointment->doctor_id }}</td>
											<td>{{ $appointment->appointment_status_id }}</td>

                                            <td>
                                                <form action="{{ route('appointments.destroy',$appointment->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('appointments.show',$appointment->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('appointments.edit',$appointment->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $appointments->links() !!}
            </div>
        </div>
    </div>
@endsection
