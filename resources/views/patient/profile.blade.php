@extends('layouts.panel')

@section('content')
<div class="col">
    <h3 class="color-text mt-3 ms-3">Mis datos personales</h3>
</div>
<div class="row" style="padding: 20px;">
    <div class="col-sm-4">
        <div class="mb-3">
            <label for="name" class="col-form-label">Nombres</label>
            <input id="name" type="text" class="form-control input-redondeado @error('name') is-invalid @enderror" name="name" autocomplete="off" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="city" class="col-form-label">Ciudad</label>
            <input id="city" type="text" class="form-control input-redondeado @error('city') is-invalid @enderror" name="city" autocomplete="off" autofocus>
            @error('city')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="age" class="col-form-label">Edad</label>
            <input id="age" type="number" class="form-control input-redondeado @error('age') is-invalid @enderror" name="age" autocomplete="off" autofocus>
            @error('age')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="mb-2" for="gender">Sexo</label>
            <select id="gender" name="gender" class="form-select input-redondeado" required>
            <option selected disabled value="">Seleccionar</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="mb-3">
            <label for="surname" class="col-form-label">Apellidos</label>
            <input id="surname" type="text" class="form-control input-redondeado @error('surname') is-invalid @enderror" name="surname" autocomplete="off" autofocus>
            @error('surname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="identificationCard" class="col-form-label">Cédula</label>
            <input id="identificationCard" type="text" class="form-control input-redondeado @error('identificationCard') is-invalid @enderror" name="identificationCard" autocomplete="off" autofocus>
            @error('identificationCard')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        <div class="mb-3">
            <label for="municipality" class="col-form-label">Municipio</label>
            <input id="municipality" type="text" class="form-control input-redondeado @error('municipality') is-invalid @enderror" name="municipality" autocomplete="off" autofocus>
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
            <input id="phoneNumber" type="text" class="form-control input-redondeado @error('phoneNumber') is-invalid @enderror" name="phoneNumber" autocomplete="off" autofocus>
            @error('phoneNumber')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="col-form-label">Correo electronico</label>
            <input id="email" type="email" class="form-control input-redondeado @error('email') is-invalid @enderror" name="email" autocomplete="off" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="col-form-label">Dirección</label>
            <input id="address" type="text" class="form-control input-redondeado @error('address') is-invalid @enderror" name="address" autocomplete="off" autofocus>
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
            <input id="email" type="email" class="form-control input-redondeado @error('email') is-invalid @enderror" name="email" autocomplete="off" autofocus>
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

@endsection
