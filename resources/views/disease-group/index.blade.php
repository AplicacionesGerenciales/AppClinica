@extends('layouts.panel')

@section('template_title')
    Disease Group
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Disease Group') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('disease-groups.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Disease Group Name</th>
										<th>Description</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($diseaseGroups as $diseaseGroup)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $diseaseGroup->disease_group_name }}</td>
											<td>{{ $diseaseGroup->description }}</td>

                                            <td>
                                                <form action="{{ route('disease-groups.destroy',$diseaseGroup->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('disease-groups.show',$diseaseGroup->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('disease-groups.edit',$diseaseGroup->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $diseaseGroups->links() !!}
            </div>
        </div>
    </div>
@endsection
