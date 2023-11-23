<div class="col">
    <h3 class="color-text mt-3 ms-3">Mis datos personales</h3>
</div>
<div class="row" style="padding: 20px;">
    <div class="col-sm-4">
        <div class="mb-3">
            <label for="name" class="col-form-label">Nombre de usuario</label>
            <input id="name" type="text" class="form-control input-redondeado @error('name') is-invalid @enderror" value="{{$admin->name}}" name="name" autocomplete="off" autofocus disabled>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-4">
        <div class="mb-3">
            <label for="email" class="col-form-label">Correo electronico</label>
            <input id="email" type="text" class="form-control input-redondeado @error('email') is-invalid @enderror" value="{{$admin->email}}" name="email" autocomplete="off" autofocus disabled>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="row" style="padding: 20px;">
    <div class="col-sm-4">
        <div class="mb-3">
            <label for="password" class="col-form-label">Contraseña</label>
            <input id="password" type="password" class="form-control input-redondeado @error('password') is-invalid @enderror" value="{{$admin->password}}" name="password" autocomplete="off" autofocus disabled>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-4">
        <div class="mb-3">
            <label for="password-confirm" class="col-form-label">Nueva Contraseña</label>
            <input id="password-confirm" type="password" class="form-control input-redondeado @error('confirm-password') is-invalid @enderror" name="confirm-password" autocomplete="off" autofocus>
            @error('password_confirmation')
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