@extends('layouts.panel')

@section('template_title')
    Status Appointment
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Status Appointment') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('status-appointments.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>State</th>
										<th>Address</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($statusAppointments as $statusAppointment)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $statusAppointment->state }}</td>
											<td>{{ $statusAppointment->address }}</td>

                                            <td>
                                                <form action="{{ route('status-appointments.destroy',$statusAppointment->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('status-appointments.show',$statusAppointment->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('status-appointments.edit',$statusAppointment->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $statusAppointments->links() !!}
            </div>
        </div>
    </div>
@endsection
