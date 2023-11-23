@extends('layouts.panel')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Consúlta Médica') }}
                            </span>
                            <div class="col text-right">
                                @can('crear-consulta-medica')
                                <a class="text-white mr-3 mt-3 btn btn-primary" data-toggle="modal" data-target="#CreateModal" data-modal-origin="create">Nuevo
                                    <i class="mr-2 fa-sharp fa-solid fa-plus"></i>
                                </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  id="datatable" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Fecha</th>
										<th>Diagnóstico</th>
										<th>Síntoma</th>
										<th>Doctor</th>
										<th>Archivo</th>
										<th>Enfermedad</th>
										<th>Presioón Sanguínea</th>
										<th>Temperatura</th>
										<th>Peso</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medicalConsultations as $medicalConsultation)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $medicalConsultation->date }}</td>
											<td>{{ $medicalConsultation->diagnostic }}</td>
											<td>{{ $medicalConsultation->symptoms }}</td>
											<td>{{ $medicalConsultation->doctor->name }}</td>
											<td>{{ $medicalConsultation->file_id }}</td>
											<td>{{ $medicalConsultation->disease->name }}</td>
											<td>{{ $medicalConsultation->blood_pressure }}</td>
											<td>{{ $medicalConsultation->temperature }}</td>
											<td>{{ $medicalConsultation->weight }}</td>
                                            <td>
                                                
                                                <form class="Form-Delete" action="{{ route('medical-consultations.destroy',$medicalConsultation->id) }}" method="POST">
                                                    @can('editar-consulta-medica')
                                                    <a class = "btn btn-sm" data-toggle="modal" data-target="#UpdateModal{{$medicalConsultation->id}}" style="background-color:#01499B; color:white;">Editar
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 20 27" fill="none">
                                                            <path d="M19.5313 4.93682L15.0624 0.468764C14.9139 0.32015 14.7375 0.202261 14.5433 0.121829C14.3492 0.0413978 14.1411 0 13.931 0C13.7208 0 13.5128 0.0413978 13.3186 0.121829C13.1245 0.202261 12.9481 0.32015 12.7995 0.468764L0.46899 12.7999C0.319775 12.948 0.201474 13.1242 0.120963 13.3183C0.0404513 13.5125 -0.000663414 13.7207 8.09464e-06 13.9309V18.4C8.09464e-06 18.8243 0.168573 19.2313 0.468619 19.5314C0.768666 19.8314 1.17562 20 1.59995 20H18.3993C18.6115 20 18.8149 19.9157 18.965 19.7657C19.115 19.6157 19.1993 19.4122 19.1993 19.2C19.1993 18.9878 19.115 18.7843 18.965 18.6343C18.8149 18.4843 18.6115 18.4 18.3993 18.4H8.33169L19.5313 7.19985C19.6799 7.05126 19.7978 6.87486 19.8782 6.68072C19.9586 6.48657 20 6.27848 20 6.06833C20 5.85818 19.9586 5.65009 19.8782 5.45595C19.7978 5.2618 19.6799 5.0854 19.5313 4.93682ZM15.9994 8.46886L11.5316 3.99981L13.9315 1.59978L18.3993 6.06883L15.9994 8.46886Z" fill="#F6F0EB"/>
                                                        </svg>
                                                    </a>
                                                    @endcan
                                                    @can('borrar-consulta-medica')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                    @csrf
                                                    @method('DELETE')
                                                    @endcan
                                                </form>
                                                <div class="modal fade" id="UpdateModal{{$medicalConsultation->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            @can('editar-consulta-medica')
                                                            <div class="modal-header">Editar Consulta
                                                                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close">
                                                                </button>
                                                            </div>
                                                            @endcan
                                                            <div class="modal-body">
                                                                <form action ="{{ route ('medical-consultations.update', $medicalConsultation->id )}}" method = "post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="mb-3">
                                                                        <label for="diagnostic" class="col-form-label">Diagnóstico</label>
                                                                        <input id="diagnostic" type="text" value="{{ $medicalConsultation->diagnostic }}" class="form-control input-redondeado @error('diagnostic') is-invalid @enderror" name="diagnostic" value="{{old ('diagnostic') }}" autocomplete="off" autofocus>
                                                                        @error('diagnostic')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="symptoms" class="col-form-label">Síntomas</label>
                                                                        <input id="symptoms" type="text" value="{{ $medicalConsultation->symptoms }}" class="form-control input-redondeado @error('symptoms') is-invalid @enderror" name="symptoms" value="{{old ('symptoms') }}" autocomplete="off" autofocus>
                                                                        @error('symptoms')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="blood_pressure" class="col-form-label">Presión Sanguínea</label>
                                                                        <input id="blood_pressure" type="text" value="{{ $medicalConsultation->blood_pressure }}" class="form-control input-redondeado @error('blood_pressure') is-invalid @enderror" name="blood_pressure" value="{{old ('blood_pressure') }}" autocomplete="off" autofocus>
                                                                        @error('blood_pressure')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="temperature" class="col-form-label">Temperatura</label>
                                                                        <input id="temperature" type="text" value="{{ $medicalConsultation->temperature }}" class="form-control input-redondeado @error('temperature') is-invalid @enderror" name="temperature" value="{{ old('temperature') }}" autocomplete="off" autofocus>
                                                                        @error('temperature')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="weight" class="col-form-label">Peso</label>
                                                                        <input id="weight" type="text" value="{{ $medicalConsultation->weight }}" class="form-control input-redondeado @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" autocomplete="off" autofocus>
                                                                        @error('weight')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-5">
                                                                        <label class="mb-3" style='width:500px' for="doctor_id" >Doctor</label>
                                                                            <select name="doctor_id" class="form-control input-redondeado" required>
                                                                            {{-- <option selected disabled value="">Seleccionar</option> --}}
                                                                            <option value=" {{ $medicalConsultation->doctor_id }}" selected>{{ $medicalConsultation->doctor->name }} </option>
                                                                                @foreach($doctor as $doctores)
                                                                                    <option value="{{$doctores->id}}" >
                                                                                        {{$doctores->name}}</option>        
                                                                                @endforeach
                                                                                
                                                                            </select>
                                                                    </div>
                                                                    <div class="col-5 mb-4">
                                                                        <label class="mb-3" style='width:500px' for="file_id" >Expediente</label>
                                                                        <select name="file_id" class="form-control input-redondeado" required>
                                                                        <option selected disabled value="">Seleccionar</option>
                                                                            @foreach($file as $files)
                                                                            <option value="{{$files->id}}" {{$files->id == $medicalConsultation->file_id ? 'selected' : ''}}>
                                                                                Numero de expediente: {{$files->file_number}}
                                                                            </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-5 mb-4">
                                                                        <label class="mb-3" style='width:500px' for="disease_id" >Enfermedad</label>
                                                                        <select name="disease_id" class="form-control input-redondeado" required>
                                                                            <option selected disabled value="">Seleccionar</option>
                                                                            @foreach($disease as $diseases)
                                                                                <option value="{{$diseases->id}}" {{$diseases->id == $medicalConsultation->disease_id ? 'selected' : ''}}>
                                                                                    {{$diseases->name}}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-5">
                                                                        <label class="mb-3" style='width:500px' for="type_examination_id" >Tipo de examen</label>
                                                                            <select name="type_examination_id" class="form-control input-redondeado" onchange="showInp1()" required>
                                                                            <option selected disabled value="">Seleccionar</option>
                                                                            <option value="Ninguno">Ninguno</option>
                                                                                @foreach($type_examination as $Tipodeexamen)
                                                                                    <option value="{{$Tipodeexamen->id}}" {{$Tipodeexamen->id == $medicalConsultation->type_examination_id ? 'selected' : ''}}>
                                                                                        {{$Tipodeexamen->name}}</option>x
                                                                                @endforeach
                                                                            </select>
                                                                    </div>
                                                                    <div class="mb-3" style="display: none" id="resultedit">
                                                                        <label for="result" class="col-form-label" id="resultedit">Resultado</label>
                                                                        <input  type="text"  class="form-control input-redondeado @error('result') is-invalid @enderror" name="result"  autocomplete="off" autofocus>
                                                                        @error('result')
                                                                            <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="date" class="col-form-label">Fecha</label>
                                                                        <input id="date" type="text" value="{{ $medicalConsultation->date }}" class="form-control input-redondeado @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" autocomplete="off" autofocus>
                                                                        @error('date')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancelar
                                                                            <i class="fa-solid fa-circle-xmark" style="color: #01499b;"></i>                        
                                                                        <button type="submit" class="btn btn-primary" data-action="edit">Guardar
                                                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
<!-- Modal crear -->
<div class="modal fade" id="CreateModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">Nueva Consulta
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action ="{{ route('medical-consultations.store') }}" method = "POST" enctype="multipart/form-data">
                {{@csrf_field()}}
                    <div class="mb-3">
                        <label for="diagnostic" class="col-form-label">Diagnóstico</label>
                        <input id="diagnostic" type="text" class="form-control input-redondeado @error('diagnostic') is-invalid @enderror" name="diagnostic" value="{{old ('diagnostic') }}" autocomplete="off" autofocus>
                        @error('diagnostic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="symptoms" class="col-form-label">Síntomas</label>
                        <input id="symptoms" type="text" class="form-control input-redondeado @error('symptoms') is-invalid @enderror" name="symptoms" value="{{old ('symptoms') }}" autocomplete="off" autofocus>
                        @error('symptoms')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="blood_pressure" class="col-form-label">Presión Sanguínea</label>
                        <input id="blood_pressure" type="text" class="form-control input-redondeado @error('blood_pressure') is-invalid @enderror" name="blood_pressure" value="{{old ('blood_pressure') }}" autocomplete="off" autofocus>
                        @error('blood_pressure')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="temperature" class="col-form-label">Temperatura</label>
                        <input id="temperature" type="text" class="form-control input-redondeado @error('temperature') is-invalid @enderror" name="temperature" value="{{ old('temperature') }}" autocomplete="off" autofocus>
                        @error('temperature')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="col-form-label">Peso</label>
                        <input id="weight" type="text" class="form-control input-redondeado @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" autocomplete="off" autofocus>
                        @error('weight')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-5 mb-4">
                        <label class="mb-3" for='doctor_id' >Doctor</label>
                        <select name="doctor_id" class="form-control input-redondeado" required>
                            <option selected disabled value="">Seleccionar</option>
                                @foreach ( $doctor as $doctors )
                                    <option value="{{ $doctors->id }}">
                                        {{ $doctors->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col-5 mb-4">
                        <label class="mb-3" for='file_id' >Expediente</label>
                        <select name="file_id" class="form-control input-redondeado" required>
                            <option selected disabled value="">Seleccionar</option>
                            @foreach($file as $files)
                                <option value="{{ $files->id }}">
                                    Numero de expediente: {{ $files->id }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-5 mb-4">
                        <label class="mb-3" for='disease_id' >Enfermedad</label>
                        <select name="disease_id" class="form-control input-redondeado" required>
                            <option selected disabled value="">Seleccionar</option>
                            @foreach($disease as $diseases)
                                <option value="{{ $diseases->id }}">
                                    {{ $diseases->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-5">
                        <label class="mb-3" style='width:500px' for="type_examination_id" >Tipo de examen</label>
                        <select name="type_examination_id" id="type_examination_id" onchange="showInp()"  class="form-control input-redondeado" required>
                        <option selected disabled value="">Seleccionar</option>
                        <option value="Ninguno">Ninguno</option>
                            @foreach($type_examination as $Tipodeexamen)
                                <option value="{{$Tipodeexamen->id}}" >
                                    {{$Tipodeexamen->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3" style="display: none" id="result">
                        <label for="result" class="col-form-label" id="result">Resultado</label>
                        <input  type="text"  class="form-control input-redondeado @error('result') is-invalid @enderror" name="result"  autocomplete="off" autofocus>
                        @error('result')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="date" class="col-form-label">Fecha</label>
                        <input id="date" type="date" class="form-control input-redondeado @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" autocomplete="off" autofocus>
                        @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancelar
                            <i class="fa-solid fa-circle-xmark" style="color: #01499b;"></i>
                        </button>
                        <button type="submit" class="btn btn-primary">Guardar
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal crear -->    
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

<script>
function showInp(){
    var getSelectValue = document.getElementById("type_examination_id").value;
    if(getSelectValue != "Ninguno"){
        console.log(getSelectValue);
        document.getElementById("result").style.display = "inline-block";
    }
    if(getSelectValue == "Ninguno")
    {
        document.getElementById("result").style.display = "none";
    }
}
function showInp1(){
    var getSelectValue = document.getElementById("type_examination_id").value;
    if(getSelectValue != "Ninguno"){
        console.log(getSelectValue);
        document.getElementById("resultedit").style.display = "inline-block";
    }
    if(getSelectValue == "Ninguno")
    {
        document.getElementById("result").style.display = "none";
    }
}
</script>
@endsection