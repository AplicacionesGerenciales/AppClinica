@extends('layouts.panel')

@section('template_title')
    Examination
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Examination') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('examinations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Result</th>
										<th>Type Examination Id</th>
										<th>Medical Consultation Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($examinations as $examination)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $examination->result }}</td>
											<td>{{ $examination->type_examination_id }}</td>
											<td>{{ $examination->medical_consultation_id }}</td>

                                            <td>
                                                <form action="{{ route('examinations.destroy',$examination->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('examinations.show',$examination->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('examinations.edit',$examination->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $examinations->links() !!}
            </div>
        </div>
    </div>
@endsection
