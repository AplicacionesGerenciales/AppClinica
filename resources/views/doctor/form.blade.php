<div class="col">
    <h3 class="color-text mt-3 ms-3">Mis datos personales de doctor</h3>
</div>
<div class="row" style="padding: 20px;">
    <div class="col-sm-4">
        <div class="mb-3">
            <label for="name" class="col-form-label">Nombres</label>
            <input id="name" type="text" class="form-control input-redondeado @error('name') is-invalid @enderror" name="name" autocomplete="off" autofocus value="{{$doctors->name}}" disabled>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="age" class="col-form-label">Edad</label>
            <input id="age" type="number" class="form-control input-redondeado @error('age') is-invalid @enderror" name="age" autocomplete="off" autofocus value="{{$doctors->age}}" disabled>
            @error('age')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="gender" class="col-form-label">Genero</label>
            <input id="gender" type="number" class="form-control input-redondeado @error('gender') is-invalid @enderror" name="gender" autocomplete="off" autofocus value="{{$doctors->gender}}" disabled>
            @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-4">
        <div class="mb-3">
            <label for="surname" class="col-form-label">Apellidos</label>
            <input id="surname" type="text" class="form-control input-redondeado @error('surname') is-invalid @enderror" name="surname" autocomplete="off" autofocus value="{{$doctors->surname}}" disabled>
            @error('surname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="identificationCard" class="col-form-label">Cédula</label>
            <input id="identificationCard" type="text" class="form-control input-redondeado @error('identificationCard') is-invalid @enderror" name="identificationCard" autocomplete="off" autofocus value="{{$doctors->name}}" disabled>
            @error('identificationCard')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        <div class="mb-3">
            <label for="municipality" class="col-form-label">Municipio</label>
            <input id="municipality" type="text" class="form-control input-redondeado @error('municipality') is-invalid @enderror" name="municipality" autocomplete="off" autofocus value="{{$doctors->name}}" disabled>
            @error('municipality')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="col">
    <h3 class="color-text mt-3 ms-3">Contacto</h3>
</div>
<div class="row" style="padding: 20px;">
    <div class="col-sm-4">
        <div class="mb-3">
            <label for="phoneNumber" class="col-form-label">Número de teléfono</label>
            <input id="phoneNumber" type="text" class="form-control input-redondeado @error('phoneNumber') is-invalid @enderror" name="phoneNumber" autocomplete="off" autofocus value="{{$doctors->phone}}" disabled>
            @error('phoneNumber')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="col-form-label">Correo electronico</label>
            <input id="email" type="email" class="form-control input-redondeado @error('email') is-invalid @enderror" name="email" autocomplete="off" autofocus value="{{$doctors->email}}" disabled>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="col-form-label">Dirección</label>
            <input id="address" type="text" class="form-control input-redondeado @error('address') is-invalid @enderror" name="address" autocomplete="off" autofocus value="{{$doctors->address}}" disabled>
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="col">
    <h3 class="color-text mt-3 ms-3">Mis credenciales/Cambiar contraseña</h3>
</div>
<div class="row" style="padding: 20px;">
    <div class="col-sm-4">
        <div class="mb-3">
            <label for="email" class="col-form-label">Usuario</label>
            <input id="email" type="email" class="form-control input-redondeado @error('email') is-invalid @enderror" name="email" autocomplete="off" autofocus value="{{$doctors->gender}}" disabled>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-4">
        <div class="mb-3">
            <label for="password" class="col-form-label">Contraseña</label>
            <input id="password" type="password" class="form-control input-redondeado @error('password') is-invalid @enderror" name="password" autocomplete="off" autofocus>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-4">
        <div class="mb-3">
            <label for="password-confirm" class="col-form-label">Confirmar Contraseña</label>
            <input id="password-confirm" type="password" class="form-control input-redondeado @error('confirm-password') is-invalid @enderror" name="confirm-password" autocomplete="off" autofocus>
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="modal-footer" align="right" style="padding: 2%">
    <button type="submit" class="btn btn-primary ml-3">Actualizar
        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
    </button>
</div>

@if (session('mensaje') == 'OkPasswordUpdate')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Actualizada!',
        text: "La contraseña ha sido actualizada correctamente!",
        confirmButtonColor: '#01499B',
        confirmButtonText: 'Ok'
    })
    </script>
@endif