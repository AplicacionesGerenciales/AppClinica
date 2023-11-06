@extends('layouts.panel')


@section('content')
<div class="row justificy-content-center" class="modal-body">
        <form action="{{ route('ChangePassword') }}" method="POST" class="needs-validation" novalidate>
          @csrf
          <div class="col">
            <h3 class="color-text mt-8 ms-8">Mis credenciales/Cambiar contraseña</h3>
          </div>
          <div class="row" style="padding: 50px;">
            <div class="col-sm-4">
              <div class="mb-3">
                <label for="name" class="col-form-label">Usuario</label>
                <input type="email" value="{{ Auth::user()->name }}" class="form-control input-redondeado @error('name') is-invalid @enderror" name="name" autocomplete="off" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label for="password_actual" class="col-form-label">Contraseña actual</label>
                <input type="password" class="form-control input-redondeado @error('password_actual') is-invalid @enderror" name="password_actual" autocomplete="off" autofocus>
                @error('password_actual')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label for="new_password" class="col-form-label">Contraseña Nueva</label>
                <input type="password" class="form-control input-redondeado @error('password') is-invalid @enderror" name="password" autocomplete="off" autofocus>
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="col-sm-4">
              <div class="mb-3">
                <label for="confirm_password" class="col-form-label">Confirma Contraseña Nueva</label>
                <input type="password" class="form-control input-redondeado @error('confirm_password') is-invalid @enderror" name="confirm_password" autocomplete="off" autofocus>
                @error('confirm_password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancelar
                    <i class="fa-solid fa-circle-xmark" style="color: #01499b;"></i>                        
                <button type="submit" class="btn btn-primary">Guardar
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                </button>
                </div>
            </div>
          </div>
        </form>
      </div>
@endsection