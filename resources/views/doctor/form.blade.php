<div class="col">
    <h3 class="color-text mt-3 ms-3">Mis datos personales</h3>
</div>
<div class="row" style="padding: 20px;">
    <div class="col-sm-4">
        <div class="mb-3">
            <label for="name" class="col-form-label">Nombres</label>
            <input id="name" type="text" class="form-control input-redondeado @error('name') is-invalid @enderror" name="name" autocomplete="off" autofocus value="{{$doctors->name." ".$doctors->lastname}}" disabled>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inss" class="col-form-label">Inss</label>
            <input id="inss" type="inss" class="form-control input-redondeado @error('inss') is-invalid @enderror" name="inss" autocomplete="off" autofocus value="{{$doctors->inss}}" disabled>
            @error('inss')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-4">
        <div class="mb-3">
            <label for="identity_card" class="col-form-label">Cédula</label>
            <input id="identity_card" type="text" class="form-control input-redondeado @error('identity_card') is-invalid @enderror" name="identity_card" autocomplete="off" autofocus value="{{$doctors->identity_card}}" disabled>
            @error('identity_card')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="specialty_id" class="col-form-label">Especialidad</label>
            <input id="specialty_id" type="text" class="form-control input-redondeado @error('specialty_id') is-invalid @enderror" name="specialty_id" autocomplete="off" autofocus value="{{$doctors->specialty->specialty}}" disabled>
            @error('specialty_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-3">
        <div class="mb-3">
            <label for="gender" class="col-form-label">Genero</label>
            <input id="gender" type="text" class="form-control input-redondeado @error('gender') is-invalid @enderror" name="gender" autocomplete="off" autofocus value="{{$doctors->gender}}" disabled>
            @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="col">
    <h3 class="color-text mt-3 ms-3">Información de contacto</h3>
</div>
<div class="row" style="padding: 20px;">
    <div class="col-sm-2">
        <div class="mb-3">
            <label for="phoneNumber" class="col-form-label">Nº de teléfono</label>
            <input id="phoneNumber" type="text" class="form-control input-redondeado @error('phoneNumber') is-invalid @enderror" name="phoneNumber" autocomplete="off" autofocus value="{{$doctors->phone}}" disabled>
            @error('phoneNumber')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-5">
        <div class="mb-3">
            <label for="address" class="col-form-label">Correo electronico</label>
            <input id="address" type="text" class="form-control input-redondeado @error('address') is-invalid @enderror" name="address" autocomplete="off" autofocus value="{{$doctors->user->email}}" disabled>
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
            <label for="user_id" class="col-form-label">Usuario</label>
            <input id="user_id" type="text" class="form-control input-redondeado @error('user_id') is-invalid @enderror" name="user_id" autocomplete="off" autofocus value="{{$doctors->user->name}}" disabled>
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