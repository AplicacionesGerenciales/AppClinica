@extends('layouts.panel')

@section('template_title')
    Antecedent
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Antecedent') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('antecedents.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Antecedent Description</th>
										<th>File Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($antecedents as $antecedent)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $antecedent->antecedent_description }}</td>
											<td>{{ $antecedent->file_id }}</td>

                                            <td>
                                                <form action="{{ route('antecedents.destroy',$antecedent->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('antecedents.show',$antecedent->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('antecedents.edit',$antecedent->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $antecedents->links() !!}
            </div>
        </div>
    </div>
@endsection
