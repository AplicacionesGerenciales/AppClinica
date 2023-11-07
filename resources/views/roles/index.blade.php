@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="row align-items-centery">
        <div class="col">
            <h3 class="color-text mt-3 ml-3">Roles</h3>
        </div>
        @can('crear-rol')
        <div class="col text-right">            
            <a class="text-white mr-3 mt-3 btn btn-primary"   onclick="openCreateModal()" data-modal-origin="create">Nuevo
                <i class="mr-2 fa-sharp fa-solid fa-plus"></i>
            </a>
        </div>
        @endcan
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table id="datatable" class="table is-striped" style="width:100%">
            <thead class=" thead-light">
                <tr>
                     
                    <th scope="col" class="color-text">Rol</th>
                    <th scope="col" class="color-text">Acciones</th>                   
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    
                    <td>{{$role->name}}</td>               
                    <td>
                        @can('editar-rol')
                            <!-- Botón para abrir el modal de edición --> 
                            <a class = "btn btn-sm btn-primary" data-toggle="modal" onclick="openEditModal({{ $role->id }})" style="background-color:#01499B; color:white;">Editar
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 20 27" fill="none">
                                    <path d="M19.5313 4.93682L15.0624 0.468764C14.9139 0.32015 14.7375 0.202261 14.5433 0.121829C14.3492 0.0413978 14.1411 0 13.931 0C13.7208 0 13.5128 0.0413978 13.3186 0.121829C13.1245 0.202261 12.9481 0.32015 12.7995 0.468764L0.46899 12.7999C0.319775 12.948 0.201474 13.1242 0.120963 13.3183C0.0404513 13.5125 -0.000663414 13.7207 8.09464e-06 13.9309V18.4C8.09464e-06 18.8243 0.168573 19.2313 0.468619 19.5314C0.768666 19.8314 1.17562 20 1.59995 20H18.3993C18.6115 20 18.8149 19.9157 18.965 19.7657C19.115 19.6157 19.1993 19.4122 19.1993 19.2C19.1993 18.9878 19.115 18.7843 18.965 18.6343C18.8149 18.4843 18.6115 18.4 18.3993 18.4H8.33169L19.5313 7.19985C19.6799 7.05126 19.7978 6.87486 19.8782 6.68072C19.9586 6.48657 20 6.27848 20 6.06833C20 5.85818 19.9586 5.65009 19.8782 5.45595C19.7978 5.2618 19.6799 5.0854 19.5313 4.93682ZM15.9994 8.46886L11.5316 3.99981L13.9315 1.59978L18.3993 6.06883L15.9994 8.46886Z" fill="#F6F0EB"/>
                                </svg>
                            </a>
                        @endcan

                        @can('borrar-rol')
                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                            <button type="submit" class="btn btn-sm btn-danger">Borrar
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 18 23" fill="none">
                            <path d="M17.25 2.76923H13.5V2.07692C13.5 1.52609 13.2629 0.997815 12.841 0.608317C12.419 0.218818 11.8467 0 11.25 0H6.75C6.15326 0 5.58097 0.218818 5.15901 0.608317C4.73705 0.997815 4.5 1.52609 4.5 2.07692V2.76923H0.75C0.551088 2.76923 0.360322 2.84217 0.21967 2.972C0.0790178 3.10184 0 3.27793 0 3.46154C0 3.64515 0.0790178 3.82124 0.21967 3.95107C0.360322 4.08091 0.551088 4.15385 0.75 4.15385H1.5V16.6154C1.5 16.9826 1.65804 17.3348 1.93934 17.5945C2.22064 17.8541 2.60218 18 3 18H15C15.3978 18 15.7794 17.8541 16.0607 17.5945C16.342 17.3348 16.5 16.9826 16.5 16.6154V4.15385H17.25C17.4489 4.15385 17.6397 4.08091 17.7803 3.95107C17.921 3.82124 18 3.64515 18 3.46154C18 3.27793 17.921 3.10184 17.7803 2.972C17.6397 2.84217 17.4489 2.76923 17.25 2.76923ZM7.5 13.1538C7.5 13.3375 7.42098 13.5135 7.28033 13.6434C7.13968 13.7732 6.94891 13.8462 6.75 13.8462C6.55109 13.8462 6.36032 13.7732 6.21967 13.6434C6.07902 13.5135 6 13.3375 6 13.1538V7.61539C6 7.43177 6.07902 7.25568 6.21967 7.12585C6.36032 6.99602 6.55109 6.92308 6.75 6.92308C6.94891 6.92308 7.13968 6.99602 7.28033 7.12585C7.42098 7.25568 7.5 7.43177 7.5 7.61539V13.1538ZM12 13.1538C12 13.3375 11.921 13.5135 11.7803 13.6434C11.6397 13.7732 11.4489 13.8462 11.25 13.8462C11.0511 13.8462 10.8603 13.7732 10.7197 13.6434C10.579 13.5135 10.5 13.3375 10.5 13.1538V7.61539C10.5 7.43177 10.579 7.25568 10.7197 7.12585C10.8603 6.99602 11.0511 6.92308 11.25 6.92308C11.4489 6.92308 11.6397 6.99602 11.7803 7.12585C11.921 7.25568 12 7.43177 12 7.61539V13.1538ZM12 2.76923H6V2.07692C6 1.89331 6.07902 1.71722 6.21967 1.58739C6.36032 1.45755 6.55109 1.38462 6.75 1.38462H11.25C11.4489 1.38462 11.6397 1.45755 11.7803 1.58739C11.921 1.71722 12 1.89331 12 2.07692V2.76923Z" fill="#F6F0EB"/>
                            </svg>
                            </button>
                        {!! Form::close() !!}
                        @endcan
                    </td>
                 </tr>                                    
                        
<!-- Modal editar -->
<div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">Editar Rol
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="editModalContent">
               <!-- aqui se carga todo lo de editar-->
            </div>
        </div>
    </div>
</div>
<!-- End Modal editar -->


                     
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination justify-content-end">
                            {!! $roles->links() !!}
        </div>
        </div>
    </div>
</div>

<!-- End Modal crear -->
<div class="modal fade" id="createModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">Crear Rol
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="createModalContent">
               <!-- aqui se carga todo lo de crear-->
            </div>
        </div>
    </div>
</div>
<!-- End Modal crear -->
@endsection

<!-- Agrega jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function openEditModal(roleId) {
        // Realizar una llamada AJAX para obtener el contenido de editar.blade.php
        $.ajax({
            url: '/roles/' + roleId + '/edit', // Asegúrate de que la ruta sea la correcta
            type: 'GET',
            success: function(response) {
                $('#editModalContent').html(response); // Colocar el contenido de editar.blade.php en el modal
                $('#editModal').modal('show'); // Mostrar el modal una vez que se haya cargado el contenido
            }
        });
    }

    function openCreateModal() {
    // Realizar una llamada AJAX para obtener el contenido de crear.blade.php
    $.ajax({
        url: '/roles/create', // Asegúrate de que la ruta sea la correcta
        type: 'GET',
        success: function(response) {
            $('#createModalContent').html(response); // Colocar el contenido de crear.blade.php en el modal
            $('#createModal').modal('show'); // Mostrar el modal una vez que se haya cargado el contenido
        }
    });
    }


</script>


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

@endsection