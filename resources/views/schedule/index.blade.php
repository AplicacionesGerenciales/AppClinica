@extends('layouts.panel')

{{-- @section('template_title')
    Schedule
@endsection --}}

@section('content')

<div class="card shadow">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow">
    <div class="row align-items-centery">
        <div class="col">
            <h3 class="color-text mt-3 ml-3">Horarios</h3>
        </div>
        <div class="col text-right">
            @can('crear-horario')
            <a class="text-white mr-3 mt-3 btn btn-primary" data-toggle="modal" data-target="#CreateModal" data-modal-origin="create">Nuevo Horario
                <i class="mr-2 fa-sharp fa-solid fa-plus"></i>
            </a> 
            @endcan
        </div>
    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover"  id="datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Día</th>
										<th>Hora de inicio</th>
										<th>Hora de salida</th>
										<th>Turno</th>
										<th>Doctor</th>
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
											<td>        @foreach ($doctores as $doctor)
                                                @if ($doctor->id === $schedule->doctor_id)
                                                    {{ $doctor->name }}  {{ $doctor->lastname }}
                                                @endif
                                            @endforeach</td>

                                            <td>
                                                <div class="modal fade" id="UpdateModal{{$schedule->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                         @can('editar-horario')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="UpdateModalLabel">Editar Horario</h5>
                                                                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close">
                                                                </button>
                                                            </div>
                                                            @endcan
                                                            <div class="modal-body">
                                                                <form action="{{ route('schedules.update', $schedule) }}" method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                         
                                                                            <div class="mb-3">
                                                                                <label for="day" class="form-label">Día</label>
                                                                                <select name="day" id="day" required class="form-control input-redondeado">
                                                                                    <option value="lunes" @if ($schedule->day == 'lunes') selected @endif>Lunes</option>
                                                                                    <option value="martes" @if ($schedule->day == 'martes') selected @endif>Martes</option>
                                                                                    <option value="miércoles" @if ($schedule->day == 'miércoles') selected @endif>Miércoles</option>
                                                                                    <option value="jueves" @if ($schedule->day == 'jueves') selected @endif>Jueves</option>
                                                                                    <option value="viernes" @if ($schedule->day == 'viernes') selected @endif>Viernes</option>
                                                                                    <option value="sábado" @if ($schedule->day == 'sábado') selected @endif>Sábado</option>
                                                                                    <option value="domingo" @if ($schedule->day == 'domingo') selected @endif>Domingo</option>
                                                                                </select>
                                                                                @error('day')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                                            
                                                                            <div class="mb-3">
                                                                                <label for="start_time" class="form-label">Hora Inicio</label>
                                                                                <input id="start_time" type="text" value="{{ $schedule->start_time }}" class="form-control input-redondeado  @error('start_time') is-invalid @enderror" name="start_time">
                                                                                @error('start_time')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                
                            
                                                                            <div class="mb-3">
                                                                                <label for="departure_time" class="form-label">Hora Salida</label>
                                                                                <input type="text" id="departure_time" class="form-control input-redondeado" name="departure_time" value="{{ $schedule->departure_time}}">
                                                                                @error('departure_time')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                
                                                                            <div class="mb-3">
                                                                                <label for="shift" class="form-label">Cambio</label>
                                                                                <input type="text" id="shift" class="form-control input-redondeado @error('shift') is-invalid @enderror" name="shift" value="{{ $schedule->shift}}">
                                                                                @error('shift')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="doctor_id" class="form-label">Doctor</label>
                                                                                <select id="doctor_id" name="doctor_id" class="form-select form-control input-redondeado"  >
                                                                                    <option value="" disabled selected>Seleccione un doctor</option>
                                                                                    @foreach ($doctores as $doctor)
                                                                                        <option value="{{ $doctor->id }}" @if ($doctor->id == $schedule->doctor_id) selected @endif >
                                                                                            {{ $doctor->name }} {{ $doctor->lastname }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('doctor_id')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                                                    
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancelar
                                                                            <i class="fa-solid fa-circle-xmark" style="color: #01499b;"></i>
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary" data-action="edit">Guardar
                                                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                
                                                <form action="{{ route('schedules.destroy',$schedule->id) }}" method="POST" class="Form-Delete">
                                                @can('editar-horario')

                                                    <a class = "btn btn-sm btn-primary" data-toggle="modal" data-target="#UpdateModal{{$schedule->id}}" style="background-color:#01499B; color:white;">Editar
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 20 27" fill="none">
                                                            <path d="M19.5313 4.93682L15.0624 0.468764C14.9139 0.32015 14.7375 0.202261 14.5433 0.121829C14.3492 0.0413978 14.1411 0 13.931 0C13.7208 0 13.5128 0.0413978 13.3186 0.121829C13.1245 0.202261 12.9481 0.32015 12.7995 0.468764L0.46899 12.7999C0.319775 12.948 0.201474 13.1242 0.120963 13.3183C0.0404513 13.5125 -0.000663414 13.7207 8.09464e-06 13.9309V18.4C8.09464e-06 18.8243 0.168573 19.2313 0.468619 19.5314C0.768666 19.8314 1.17562 20 1.59995 20H18.3993C18.6115 20 18.8149 19.9157 18.965 19.7657C19.115 19.6157 19.1993 19.4122 19.1993 19.2C19.1993 18.9878 19.115 18.7843 18.965 18.6343C18.8149 18.4843 18.6115 18.4 18.3993 18.4H8.33169L19.5313 7.19985C19.6799 7.05126 19.7978 6.87486 19.8782 6.68072C19.9586 6.48657 20 6.27848 20 6.06833C20 5.85818 19.9586 5.65009 19.8782 5.45595C19.7978 5.2618 19.6799 5.0854 19.5313 4.93682ZM15.9994 8.46886L11.5316 3.99981L13.9315 1.59978L18.3993 6.06883L15.9994 8.46886Z" fill="#F6F0EB"/>
                                                        </svg>
                                                    </a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="modal fade" id="CreateModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="CreateModalLabel">Agregar Horario</h5>
                                    <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('schedules.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="day" class="form-label">Día</label>
                                                    <select name="day" id="day" required class="form-control input-redondeado">
                                                    <option value="" disabled selected>Seleccione un dia</option>
                                                        <option value="lunes" @if (old('day') == 'lunes') selected @endif>Lunes</option>
                                                        <option value="martes" @if (old('day') == 'martes') selected @endif>Martes</option>
                                                        <option value="miércoles" @if (old('day') == 'miércoles') selected @endif>Miércoles</option>
                                                        <option value="jueves" @if (old('day') == 'jueves') selected @endif>Jueves</option>
                                                        <option value="viernes" @if (old('day') == 'viernes') selected @endif>Viernes</option>
                                                        <option value="sábado" @if (old('day') == 'sábado') selected @endif>Sábado</option>
                                                        <option value="domingo" @if (old('day') == 'domingo') selected @endif>Domingo</option>
                                                    </select>
                                                    @error('day')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="start_time" class="form-label">Hora Inicio</label>
                                                    <input type="time" id="start_time" class="form-control input-redondeado  @error('start_time') is-invalid @enderror" name="start_time" value="{{ old('start_time') }}">
                                                </div>
                    
                                                <div class="mb-3">
                                                    <label for="departure_time" class="form-label">Hora Salida</label>
                                                    <input type="time" id="departure_time" class="form-control input-redondeado" name="departure_time" value="{{ old('departure_time') }}">
                                                </div>
                

                                                <div class="mb-3">
                                                    <label for="shift" class="form-label">Turno</label>
                                                    <input type="text" id="shift" class="form-control input-redondeado @error('shift') is-invalid @enderror " name="shift" value="{{ old('shift') }}">
                                                    @error('shift')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                     <label for="doctor_id" class="form-label">Seleccionar Doctor</label>
                                                     <select id="doctor_id" name="doctor_id" class="form-select form-control input-redondeado"  >
                                                <option value="" disabled selected>Seleccione un doctor</option>
                                                @foreach ($doctores as $doctor)
                                                    <option value="{{ $doctor->id }}">
                                                        {{ $doctor->name }} {{ $doctor->lastname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                                    @error('doctor_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancelar
                                                <i class="fa-solid fa-circle-xmark" style="color: #01499b;"></i>
                                            </button>
                                            <button type="submit" class="btn btn-primary">Guardar Horario
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                                    <!-- ... -->
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                {!! $schedules->links() !!}
            </div>
        </div>
    </div>
@endsection

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
    title: '¿Seguro que deseas eliminar este registro?',
    text: 'Esta acción no se puede deshacer.',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#01499B',
    confirmButtonText: 'Sí, eliminar',
    cancelButtonText: 'Cancelar',
}).then((result) => {
    if (result.isConfirmed) {
        this.submit();
    }
})

    })
</script>
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
