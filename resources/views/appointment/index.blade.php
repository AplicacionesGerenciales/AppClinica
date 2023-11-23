@extends('layouts.panel')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('Agenda/Citas') }}
                        </span>
                        <div>
                            <!-- boton para llamar al modal create -->
                            @can('crear-cita')
                            <div class="float-right">
                                <a href="{{ route('appointments.create') }}" class="text white mr-2 mt-3 btn btn-primary" data-toggle="modal" data-target="#CreateModal">
                                    {{ __('Nuevo') }}
                                    <i Class="mr-2 fa-sharp fa-solid fa-plus">
                                        <!-- ::before == $0 -->
                                    </i>
                                </a>
                            </div>
                            @endcan
                            @can('crear-cita')
                            <a href="{{ url ('appointments.importExcel') }}" class="mr-2 mt-3 btn btn-primary" >Exportar
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 16 18" fill="none">
                                    <path d="M15.5 8.33376V16.3334C15.5 16.7754 15.3282 17.1993 15.0225 17.5119C14.7167 17.8244 14.302 18 13.8696 18H2.13043C1.69802 18 1.28331 17.8244 0.977543 17.5119C0.671777 17.1993 0.5 16.7754 0.5 16.3334V8.33376C0.5 7.89175 0.671777 7.46784 0.977543 7.1553C1.28331 6.84275 1.69802 6.66716 2.13043 6.66716H4.08696C4.34641 6.66716 4.59523 6.77252 4.77869 6.96004C4.96215 7.14757 5.06522 7.40191 5.06522 7.66712C5.06522 7.93232 4.96215 8.18667 4.77869 8.3742C4.59523 8.56172 4.34641 8.66708 4.08696 8.66708H2.45652V16.0001H13.5435V8.66708H11.913C11.6536 8.66708 11.4048 8.56172 11.2213 8.3742C11.0379 8.18667 10.9348 7.93232 10.9348 7.66712C10.9348 7.40191 11.0379 7.14757 11.2213 6.96004C11.4048 6.77252 11.6536 6.66716 11.913 6.66716H13.8696C14.302 6.66716 14.7167 6.84275 15.0225 7.1553C15.3282 7.46784 15.5 7.89175 15.5 8.33376ZM5.43125 5.0414L7.02174 3.41731V10.3337C7.02174 10.5989 7.12481 10.8532 7.30827 11.0407C7.49172 11.2283 7.74055 11.3336 8 11.3336C8.25945 11.3336 8.50828 11.2283 8.69173 11.0407C8.87519 10.8532 8.97826 10.5989 8.97826 10.3337V3.41731L10.5688 5.0439C10.6597 5.13692 10.7678 5.2107 10.8867 5.26104C11.0056 5.31138 11.133 5.33729 11.2617 5.33729C11.3904 5.33729 11.5178 5.31138 11.6367 5.26104C11.7556 5.2107 11.8636 5.13692 11.9546 5.0439C12.0456 4.95088 12.1178 4.84046 12.167 4.71893C12.2163 4.5974 12.2416 4.46714 12.2416 4.3356C12.2416 4.20405 12.2163 4.0738 12.167 3.95227C12.1178 3.83074 12.0456 3.72031 11.9546 3.6273L8.69375 0.294109C8.60287 0.200886 8.49487 0.126919 8.37596 0.0764496C8.25705 0.0259798 8.12957 0 8.00081 0C7.87206 0 7.74458 0.0259798 7.62567 0.0764496C7.50676 0.126919 7.39876 0.200886 7.30788 0.294109L4.04701 3.6273C3.95601 3.72031 3.88383 3.83074 3.83458 3.95227C3.78534 4.0738 3.75999 4.20405 3.75999 4.3356C3.75999 4.60126 3.86323 4.85605 4.04701 5.0439C4.23079 5.23175 4.48005 5.33729 4.73995 5.33729C4.99985 5.33729 5.2491 5.23175 5.43288 5.0439L5.43125 5.0414Z" fill="white"/>
                                </svg>
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id= "datatable" class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                <th scope="col" class="color-text">No</th>
                                    <th>Fecha</th>
                                    <th>Comentario</th>
                                    <th>Paciente</th>
                                    <th>Doctor</th>
                                    <th>Estado cita</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr>
                                    <td>{{ ++$i }}</td>
                                        <td>{{ $appointment->date }}</td>
                                        <td>{{ $appointment->comment }}</td>
                                        <td>{{ $appointment->patient }}</td>
                                        <td>{{ $appointment->doctor }}</td>
                                        <td>{{ $appointment->appointment_status }}</td>
                                        <td> 
                                            <!-- esto de modal sirve para que se muestre la informacion en una ventana emergente -->
                                            <div class="modal fade" id="UpdateModal{{$appointment->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content modal-content-extra">
                                                        
                                                        <div class="modal-header-extra"><h3>Editar Citas</h3></div>
                                                        <div class="modal-header-extra2"><h4>Datos de la Citas</h4></div>                     
                                                        <div class="modal-body">
                                                            <form action ="{{ route ('appointments.update', $appointment->id )}}" method = "post">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-3">
                                                                    <label for="date" class="col-form-label">Fecha</label>
                                                                    <input id="date" type="date" value="{{ $appointment->date }}" class="form-control input-redondeado @error('date') is-invalid @enderror" name="date"  autocomplete="off" autofocus>
                                                                    @error('date')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3 mb-3-extra">
                                                                    <label for="comment" class="col-form-label">Comentario</label>
                                                                    <input id="comment" type="text" value="{{ $appointment->comment }}" class="form-control input-redondeado @error('comment') is-invalid @enderror" name="comment"  autocomplete="off" autofocus>
                                                                    @error('comment')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-5">
                                                                    <label class="mb-3" style='width:500px' for="patient_id">Paciente</label>
                                                                        <select name="patient_id" class="form-control input-redondeado" required>
                                                                            <option selected disabled value="">Seleccionar</option>
                                                                                @foreach($patient as $Idpaciente)
                                                                                    <option value="{{$Idpaciente->id}}" {{$Idpaciente->id == $appointment->patient_id ? 'selected' : ''}} >
                                                                                        {{$Idpaciente->name}} 
                                                                                    </option>
                                                                                @endforeach
                                                                        </select>
                                                                </div> 
                                                                <div class="col-5">
                                                                    <label class="mb-3" style='width:500px' for="doctor_id">Doctor</label>
                                                                        <select name="doctor_id" class="form-control input-redondeado" required>
                                                                            <option selected disabled value="">Seleccionar</option>
                                                                                @foreach($doctor as $Iddoctor)
                                                                                    <option value="{{$Iddoctor->id}}" {{$Iddoctor->id == $appointment->doctor_id ? 'selected' : ''}} >
                                                                                        {{$Iddoctor->name}} 
                                                                                    </option>
                                                                                @endforeach
                                                                        </select>
                                                                </div> 
                                                                <div class="col-5">
                                                                    <label class="mb-3" style='width:500px' for="appointment_status_id">Estado de la Cita</label>
                                                                        <select name="appointment_status_id" class="form-control input-redondeado" required>
                                                                            <option selected disabled value="">Seleccionar</option>
                                                                                @foreach($appointment_status as $Appointmentstatus)
                                                                                    <option value="{{$Appointmentstatus->id}}" {{$Appointmentstatus->id == $appointment->appointment_status_id  ? 'selected' : ''}} >
                                                                                        {{$Appointmentstatus->state}} 
                                                                                    </option>
                                                                                @endforeach
                                                                        </select>
                                                                </div> 
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-outline-primary boton-estilo" data-dismiss="modal" style="background: rgba(92, 89, 89, 1); color:#ffffff;">Cancelar
                                                                        <i class="fa-solid fa-circle-xmark" style="color: rgb(255, 255, 255)"></i>                        
                                                                    <button type="submit" class="btn btn-primary boton-estilo" data-action="edit">Guardar
                                                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- formato de botones original -->
                                            <form class="Form-Delete" action="{{ route('appointments.destroy',$appointment->id) }}" method="POST">
                                                @csrf 
                                                @method('DELETE')
                                                <a class="btn btn-sm btn-success" id="btn-editar" href="{{ route('appointments.edit', $appointment->id) }}" data-toggle="modal" data-target="#UpdateModal{{ $appointment->id }}">
                                                    <!-- <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }} -->
                                                    Editar
                                                </a>
                                                <button class="btn btn-danger btn-sm" id="btn-editar"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- esto de modal sirve para que se muestre la informacion en una ventana emergente -->
<div class="modal fade" id="CreateModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-content-extra">
        <div class="modal-header-extra"><h3>Crear Citas</h3></div>
        <div class="modal-header-extra2"><h4>Datos de la Citas</h4></div>
            <div class="modal-body">
                <form action ="{{ route ('appointments.store')}}" method = "post">
                    @csrf
                    <div class="mb-3 mb-3-extra">
                        <label for="date" class="col-form-label">Fecha</label>
                        <input id="date" type="date" value="{{ old('date') }}" class="form-control input-redondeado @error('date') is-invalid @enderror" name="date"  autocomplete="off" autofocus>
                        @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 mb-3-extra">
                        <label for="comment" class="col-form-label">Comentario</label>
                        <input id="comment" type="text" value="{{ old('comment') }}" class="form-control input-redondeado @error('comment') is-invalid @enderror" name="comment"  autocomplete="off" autofocus>
                        @error('comment')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-5">
                        <label class="mb-3" style='width:500px' for="patient_id">Paciente</label>
                        <select name="patient_id" class="form-control input-redondeado" required>
                        <option selected disabled value="">Seleccionar</option>
                            @foreach($patient as $Idpaciente)
                                <option value="{{$Idpaciente->id}}"  >
                                    {{$Idpaciente->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-5">
                        <label class="mb-3" style='width:500px' for="doctor_id" >Doctor</label>
                        <select name="doctor_id" class="form-control input-redondeado" required>
                        <option selected disabled value="">Seleccionar</option>
                            @foreach($doctor as $Iddoctor)
                                <option value="{{$Iddoctor->id}}"  >
                                    {{$Iddoctor->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-5">
                        <label class="mb-3" style='width:500px' for="appointment_status_id" >Estado de la Cita</label>
                        <select name="appointment_status_id" class="form-control input-redondeado" required>
                        <option selected disabled value="">Seleccionar</option>
                            @foreach($appointment_status as $Appointmentstatus)
                                <option value="{{$Appointmentstatus->id}}">
                                    {{$Appointmentstatus->state}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal" style="background: rgba(92, 89, 89, 1); color:#ffffff;">Cancelar
                            <i class="fa-solid fa-circle-xmark" style="color: rgb(255, 255, 255);"></i>                        
                        <button type="submit" class="btn btn-primary" data-action="store">Guardar
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><style>svg{fill:rgb(255, 255, 255)}</style><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    

@section('js')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
    $('#datatable').DataTable({
                language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
            },
            "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "Todos"]]
        })
    });
</script>

<script>
    $('.Form-Delete').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'El registro será eliminado permanentemente',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#01499B',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit()
            }
        })
    })
</script>
@endsection
@if ($errors->any())
    @include('includes.alerts.error')  
@endif
@if (session('mensaje') == 'OkDelete')
    @include('includes.alerts.delete')  
@endif
@if (session('mensaje') == 'OkCreate')
    @include('includes.alerts.create')  
@endif
@if (session('mensaje') == 'OkUpdate')
    @include('includes.alerts.edit')  
@endif
@endsection