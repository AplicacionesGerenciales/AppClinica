@extends('layouts.panel')

@section('template_title')
    Doctor Notification
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Doctor Notification') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('doctor-notifications.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Shipment Date</th>
										<th>Message</th>
										<th>Doctor Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctorNotifications as $doctorNotification)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $doctorNotification->shipment_date }}</td>
											<td>{{ $doctorNotification->message }}</td>
											<td>{{ $doctorNotification->doctor_id }}</td>

                                            <td>
                                                <form action="{{ route('doctor-notifications.destroy',$doctorNotification->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('doctor-notifications.show',$doctorNotification->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('doctor-notifications.edit',$doctorNotification->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $doctorNotifications->links() !!}
            </div>
        </div>
    </div>
@endsection
