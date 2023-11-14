@extends('layouts.applogin')

@section('content')
<div class="main-container">
  
  <div class="img-login" style="background-image:url({{ asset('images/dashboard/Banner-Login.jpg') }})">
        <!-- <img src="/img/Medicos.jpg" alt="doctores"> -->
    </div>
    <div class="form-container">
            <div class="form-login">
                <div class="container-logo-login">
                    <img src="{{asset('images/Logo.png')}}" alt="Logo" class="img-logo">
                </div>
                
                <div class="text-Login">
                    <small style="font-weight: 700">
                            Inicia Sesión
                    </small>
                </div>
                <form role="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="text-input-form">
                        <span >Usuario</span>
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-3">
                        
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa-solid fa-at" style="color: #000000;"></i></span>
                            </div>
                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Usuario') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                        </div>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="text-input-form">
                        <span >Contraseña</span>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa-solid fa-lock" style="color: #000000;"></i></span>
                            </div>
                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Contraseña') }}" type="password" value="" required>
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="custom-control custom-control-alternative custom-checkbox">
                        <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="customCheckLogin">
                            <span class="" style="color: #9c9c9c;--bs-text-opacity: 1;" >{{ __('Recordar sesión') }}</span>
                        </label>
                    </div>
                    <div class="text-center ">
                        <button type="submit " class="btn btn-primary my-4 submit-button" style="width: 20rem; font-weigth:800; font-size:1.25rem;">{{ __('Iniciar sesión') }}</button>
                    </div>
                </form>
                <div class="fogot-password-container">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">
                            <small class="forgot-password">{{ __('¿Has olvidado tu contraseña?') }}</small>
                        </a>
                    @endif
                </div>
            </div>
    </div>
    
</div>
@endsection
