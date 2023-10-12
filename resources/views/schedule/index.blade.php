@extends('layouts.panel')

@section('template_title')
    Schedule
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Schedule') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('schedules.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Day</th>
										<th>Start Time</th>
										<th>Departure Time</th>
										<th>Shift</th>
										<th>Doctor Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schedules as $schedule)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $schedule->day }}</td>
											<td>{{ $schedule->start_time }}</td>
											<td>{{ $schedule->departure_time }}</td>
											<td>{{ $schedule->shift }}</td>
											<td>{{ $schedule->doctor_id }}</td>

                                            <td>
                                                <form action="{{ route('schedules.destroy',$schedule->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('schedules.show',$schedule->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('schedules.edit',$schedule->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $schedules->links() !!}
            </div>
        </div>
    </div>
@endsection
