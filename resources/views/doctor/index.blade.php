@extends('layouts.panel')

@section('template_title')
    Doctor
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Doctor') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('doctors.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Lastname</th>
										<th>Phone</th>
										<th>Identity Card</th>
										<th>Gender</th>
										<th>Inss</th>
										<th>Specialty Id</th>
										<th>User Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctors as $doctor)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $doctor->name }}</td>
											<td>{{ $doctor->lastname }}</td>
											<td>{{ $doctor->phone }}</td>
											<td>{{ $doctor->identity_card }}</td>
											<td>{{ $doctor->gender }}</td>
											<td>{{ $doctor->inss }}</td>
											<td>{{ $doctor->specialty_id }}</td>
											<td>{{ $doctor->user_id }}</td>

                                            <td>
                                                <form action="{{ route('doctors.destroy',$doctor->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('doctors.show',$doctor->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('doctors.edit',$doctor->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $doctors->links() !!}
            </div>
        </div>
    </div>
@endsection
