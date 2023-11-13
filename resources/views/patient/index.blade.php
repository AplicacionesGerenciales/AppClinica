@extends('layouts.panel')

@section('template_title')
    Patient
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row align-items-centery">
            <div class="col-sm-12">
                <h4 style="color: #ffffff; margin-bottom:3%; margin-left:2%">Gestión / Pacientes</h4>     
                <div class="card card-copia">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Lista de Pacientes') }}
                            </span>

                                <div>
                                    <a href="{{ url ('patients.importExcel') }}" class="mr-2 mt-3 btn btn-primary" >Exportar
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 16 18" fill="none">
                                            <path d="M15.5 8.33376V16.3334C15.5 16.7754 15.3282 17.1993 15.0225 17.5119C14.7167 17.8244 14.302 18 13.8696 18H2.13043C1.69802 18 1.28331 17.8244 0.977543 17.5119C0.671777 17.1993 0.5 16.7754 0.5 16.3334V8.33376C0.5 7.89175 0.671777 7.46784 0.977543 7.1553C1.28331 6.84275 1.69802 6.66716 2.13043 6.66716H4.08696C4.34641 6.66716 4.59523 6.77252 4.77869 6.96004C4.96215 7.14757 5.06522 7.40191 5.06522 7.66712C5.06522 7.93232 4.96215 8.18667 4.77869 8.3742C4.59523 8.56172 4.34641 8.66708 4.08696 8.66708H2.45652V16.0001H13.5435V8.66708H11.913C11.6536 8.66708 11.4048 8.56172 11.2213 8.3742C11.0379 8.18667 10.9348 7.93232 10.9348 7.66712C10.9348 7.40191 11.0379 7.14757 11.2213 6.96004C11.4048 6.77252 11.6536 6.66716 11.913 6.66716H13.8696C14.302 6.66716 14.7167 6.84275 15.0225 7.1553C15.3282 7.46784 15.5 7.89175 15.5 8.33376ZM5.43125 5.0414L7.02174 3.41731V10.3337C7.02174 10.5989 7.12481 10.8532 7.30827 11.0407C7.49172 11.2283 7.74055 11.3336 8 11.3336C8.25945 11.3336 8.50828 11.2283 8.69173 11.0407C8.87519 10.8532 8.97826 10.5989 8.97826 10.3337V3.41731L10.5688 5.0439C10.6597 5.13692 10.7678 5.2107 10.8867 5.26104C11.0056 5.31138 11.133 5.33729 11.2617 5.33729C11.3904 5.33729 11.5178 5.31138 11.6367 5.26104C11.7556 5.2107 11.8636 5.13692 11.9546 5.0439C12.0456 4.95088 12.1178 4.84046 12.167 4.71893C12.2163 4.5974 12.2416 4.46714 12.2416 4.3356C12.2416 4.20405 12.2163 4.0738 12.167 3.95227C12.1178 3.83074 12.0456 3.72031 11.9546 3.6273L8.69375 0.294109C8.60287 0.200886 8.49487 0.126919 8.37596 0.0764496C8.25705 0.0259798 8.12957 0 8.00081 0C7.87206 0 7.74458 0.0259798 7.62567 0.0764496C7.50676 0.126919 7.39876 0.200886 7.30788 0.294109L4.04701 3.6273C3.95601 3.72031 3.88383 3.83074 3.83458 3.95227C3.78534 4.0738 3.75999 4.20405 3.75999 4.3356C3.75999 4.60126 3.86323 4.85605 4.04701 5.0439C4.23079 5.23175 4.48005 5.33729 4.73995 5.33729C4.99985 5.33729 5.2491 5.23175 5.43288 5.0439L5.43125 5.0414Z" fill="white"/>
                                        </svg>
                                    </a>
    
                                    <div class="float-right">
                                        <a class="text-white mr-3 mt-3 btn btn-primary" data-toggle="modal" data-target="#CreateModal" data-modal-origin="create">Nuevo
                                            <i class="mr-2 fa-sharp fa-solid fa-plus"></i>
                                        </a>
                                  </div>
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
                            <table id="datatable" class="table table-striped table-hover">
                                <thead class=" thead-light">
                                    <tr>
                                        <th scope="col" class="color-text">No</th>
                                        
										<th scope="col" class="color-text">Nombre</th>
										<th scope="col" class="color-text">edad</th>
										<th scope="col" class="color-text">Telefono</th>
										<th scope="col" class="color-text">Acciones</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $patient->name}} {{ $patient->surname }}</td>
											<td>{{ $patient->phone }}</td>
											<td>{{ $patient->age }}</td>
                                            <td>
                                                <div class="modal modal-copia fade fade-copia" id="UpdateModal{{$patient->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-copia">
                                                        <div class="modal-content modal-content-copia">
                                                            <div class="modal-header-copia"><h1>Editar Paciente</h1>
                                                                
                                                            </div>
                                                            <div class="modal-body modal-body-copia">
                                                                <form action ="{{ route ('patients.update', $patient->id )}}" method = "post">
                                                                                    @csrf
                                                                                    @method('PUT')

                                                                                    <h3>Datos Personales</h3>   
                                            <div class="modal-row modal-row-copia">
                                                <div class="mb-3 mb-3-copia">
                                                    <label for="name" class="col-form-label">Nombre</label>
                                                    <input id="name" type="text" value="{{$patient->name}}" class="form-control input-redondeado @error('name') is-invalid @enderror" name="name"  autocomplete="off" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
    
                                                <div class="mb-3 mb-3-copia">
                                                    <label for="surname" class="col-form-label">Apellido</label>
                                                    <input id="surname" type="text" value="{{$patient->surname}}" class="form-control input-redondeado @error('surname') is-invalid @enderror" name="surname"  autocomplete="off" autofocus>
                                                    @error('surname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                
                                                <div class="mb-3 mb-3-copia">
                                                    <label for="identification_card" class="col-form-label">Cedula</label>
                                                    <input id="identification_card" type="text" value="{{$patient->identification_card}}" class="form-control input-redondeado @error('identification_card') is-invalid @enderror" name="identification_card">
                                                    @error('identification_card')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div> 
    
                                                    <div class="mb-3 mb-3-mutacion mb-3-copia">
                                                    <div>
                                                    <label for="age" class="col-form-label">Edad</label>
                                                    <input id="age" type="text" value="{{$patient->age}}" class="form-control input-redondeado input @error('age') is-invalid @enderror"  name="age" >
                                                    @error('age')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 mb-3-copia">
                                                    <label for="gender" class="col-form-label">Sexo</label>
                                                    <input id="gender" type="text" value="{{$patient->gender}}" class="form-control input-redondeado input-gender @error('gender') is-invalid @enderror" name="gender">
                                                    @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    </div> 
                                                </div>                  
    
                                                <div class="mb-3 mb-3-copia mb-3-copia">
                                                    <label for="birthdate" class="col-form-label">Fecha de nacimiento</label>
                                                    <input id="birthdate" type="text" value="{{$patient->birthdate}}" class="form-control input-redondeado @error('birthdate') is-invalid @enderror" name="birthdate">
                                                    @error('birthdate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                        @enderror
                                                </div>
                                            </div>

                            <h3>Datos de contacto</h3>

                        <div class="modal-row  mb-3-contact mb-3-copia">
                            <div class="mb-3">
                                <label for="phone" class="col-form-label">N° de telefono</label>
                                <input id="phone" type="text" value="{{$patient->phone}}" class="form-control input-redondeado @error('phone') is-invalid @enderror" name="phone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div>
                                <div class="mb-3">
                                    <label for="address" class="col-form-label">Correo electrónico</label>
                                    <input id="address" type="text" value="{{$patient->address}}" class="form-control input-redondeado input_phone @error('address') is-invalid @enderror" name="address">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                        </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" id="btn-style" class="btn btn-outline-primary" data-dismiss="modal" style="background: rgba(92, 89, 89, 1); color:#ffffff;">Cancelar
                                <i class="fa-solid fa-circle-xmark" style="color: rgb(255, 255, 255);"></i>                        
                            <button type="submit" id="btn-style" class="btn btn-primary" data-action="store">Guardar
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><style>svg{fill:rgb(255, 255, 255)}</style><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <form class="Form-Delete" action="{{ route('patients.destroy',$patient->id) }}" method="POST">
            <a class="btn btn-sm btn-primary" id="btn-edit" data-toggle="modal" data-target="#CreateModalPosts{{$patient->id}}" data-modal-origin="create">{{ __('Enviar notificacion') }}</a>
            <a class="btn btn-sm btn-success " id="btn-edit" data-toggle="modal" data-target="#UpdateModal{{$patient->id}}">{{ __('Edit') }}</a>
            @csrf
            @method('DELETE')
            <button type="submit" id="btn-edit" class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
        </form>
        <!-- Modal crear -->
        <div class="modal fade" id="CreateModalPosts{{$patient->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-copia">
                <div class="modal-content modal-content-copia">
                    <div class="modal-header">Crear Notificacion
                        <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action ="{{ route('doctors.createNotification') }}" method = "POST" enctype="multipart/form-data">
                        {{@csrf_field()}}
        
                        <input hidden  id="userr_id" type="text" class="form-control input-redondeado" name="userr_id" value="{{$patient->id}}" autocomplete="off" autofocus>
                <div class="mb-3 mb-3-notification">
                    <label for="name" class="col-form-label">Destinatario</label>
                    <input readonly required id="name" type="text" class="form-control input-redondeado" name="name" value="{{$patient->name}}" autocomplete="off" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 mb-3-notification">
                <label for="affair" class="col-form-label">Asunto</label>
                <input required id="affair" type="text" class="form-control input-redondeado" name="affair" value="{{old('affair')}}" autocomplete="off" autofocus>
                @error('affair')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
                    <div class="mb-3 mb-3-notification">
                        <label for="message" class="col-form-label mt-3">Mensaje</label>
                        <textarea required id="message" class="form-control input-redondeado" name="message">{{old('message') }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button"  class="btn btn-outline-primary btn-notification" data-dismiss="modal">Cancelar
                            <i class="fa-solid fa-circle-xmark" style="color: #ffffff;"></i>                        
                        <button type="submit" class="btn btn-primary btn-notification btn-notification-save">Guardar
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
  <!-- End Modal crear -->
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

        <div class="modal modal-copia fade fade-copia CreateModal" id="CreateModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-copia">
                <div class="modal-content modal-content-copia">
                    <div class="modal-header-copia"><h1>Crear paciente</h1>                     
                    </div>
                    
                    <div class="modal-body modal-body-copia">
                        <form action ="{{ route ('patients.store')}}" method = "post">
                            @csrf
                            <h3>Datos Personales</h3>   
                            <div class="modal-row modal-row-copia">
                                <div class="mb-3 mb-3-copia">
                                    <label for="name" class="col-form-label">Nombre</label>
                                    <input id="name" type="text" value="{{old('name')}}" class="form-control input-redondeado @error('name') is-invalid @enderror" name="name"  autocomplete="off" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
    
                                <div class="mb-3 mb-3-copia">
                                    <label for="surname" class="col-form-label">Apellido</label>
                                    <input id="surname" type="text" value="{{old('surname')}}" class="form-control input-redondeado @error('surname') is-invalid @enderror" name="surname"  autocomplete="off" autofocus>
                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                
                                <div class="mb-3 mb-3-copia">
                                    <label for="identification_card" class="col-form-label">Cedula</label>
                                    <input id="identification_card" type="text" value="{{old('identification_card')}}" class="form-control input-redondeado @error('identification_card') is-invalid @enderror" name="identification_card">
                                    @error('identification_card')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div> 
    
                                <div class="mb-3 mb-3-mutacion mb-3-copia">
                                   <div>
                                    <label for="age" class="col-form-label">Edad</label>
                                    <input id="age" type="text" value="{{old('age')}}" class="form-control input-redondeado input @error('age') is-invalid @enderror"  name="age" >
                                    @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                   </div>

                                <div class="mb-3 mb-3-copia">
                                    <label for="gender" class="col-form-label">Sexo</label>
                                    <input id="gender" type="text" value="{{old('gender')}}" class="form-control input-redondeado input-gender @error('gender') is-invalid @enderror" name="gender">
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div> 
                                </div>                  
    
                                <div class="mb-3 mb-3-copia">
                                    <label for="birthdate" class="col-form-label">Fecha de nacimiento</label>
                                    <input id="birthdate" type="text" value="{{old('birthdate')}}" class="form-control input-redondeado @error('birthdate') is-invalid @enderror" name="birthdate">
                                    @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <h3>Datos de contacto</h3>

                        <div class="modal-row  mb-3-contact mb-3-copia">
                            <div class="mb-3">
                                <label for="phone" class="col-form-label">N° de telefono</label>
                                <input id="phone" type="text" value="{{old('phone')}}" class="form-control input-redondeado @error('phone') is-invalid @enderror" name="phone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div>
                                <div class="mb-3 mb-3-copia">
                                    <label for="address" class="col-form-label">Correo electrónico</label>
                                    <input id="address" type="text" value="{{old('address')}}" class="form-control input-redondeado input_phone @error('address') is-invalid @enderror" name="address">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                        </div>

                          
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
@if (session('mensaje') == 'OkCreateNotification')
    @include('includes.alerts.notificationCreate')  
@endif
@if (session('mensaje') == 'OkUpdate')
    @include('includes.alerts.edit')  
@endif
@endsection


