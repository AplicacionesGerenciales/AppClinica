@extends('layouts.panel')

@section('template_title')
    Patient
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Patient') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('patients.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Name</th>
										<th>Surname</th>
										<th>Age</th>
										<th>Gender</th>
										<th>Identification Card</th>
										<th>Phone</th>
										<th>Birthdate</th>
										<th>Address</th>
										<th>User Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $patient->name }}</td>
											<td>{{ $patient->surname }}</td>
											<td>{{ $patient->age }}</td>
											<td>{{ $patient->gender }}</td>
											<td>{{ $patient->identification_card }}</td>
											<td>{{ $patient->phone }}</td>
											<td>{{ $patient->birthdate }}</td>
											<td>{{ $patient->address }}</td>
											<td>{{ $patient->user_id }}</td>

                                            <td>
                                                <form action="{{ route('patients.destroy',$patient->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('patients.show',$patient->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('patients.edit',$patient->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $patients->links() !!}
            </div>
        </div>
    </div>
@endsection
