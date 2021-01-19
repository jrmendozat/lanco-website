@extends('layouts-desktop.app')

@section('content')

<div class="response">

    <div class="row">	
      <div class="col-md-4 text-center">
        <div class="author-info">
        <img src="/image/store/logos/Logo_1.png" alt="Logo" style="height: 50px;
	          width: 50px; margin-right:5px">
        </div>
      </div>
      <div class="col-md-4 text-center">
            <h4 style="font-family: 'Roboto', bold;">Bienvenidos</h4>
      </div>
      <div class="col-md-4 text-center">
        <a href="{{ route('home') }}" type="button" style="margin-bottom:5px;  border-radius:1em;"class="btn-warning btn-sm"><i style="margin-right:5px" class="fas fa-home iconstyle7"></i>Regresar</a>
      </div>
    </div><hr> 
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary" >{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}">

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Clave') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme Clave') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Dirección Corta</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cell_phone" class="col-md-4 col-form-label text-md-right">Nro. Teléfono Móvil</label>
                            <div class="col-md-6">
                                <input id="cell_phone" type="text" onkeypress="return isNumberKeyInt(event)" class="form-control" name="cell_phone" value="{{ old('cell_phone') }}" required>
                                @if ($errors->has('cell_phone'))
                                    <span role="alert">
                                        <strong>Error: Número Teléfono invalido o ya registrado con otro usuario</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                        <div class="form-group row">
                            <label for="local_phone" class="col-md-4 col-form-label text-md-right">Nro. Teléfono Local</label>
                            <div class="col-md-6">
                                <input id="local_phone" type="text" onkeypress="return isNumberKeyInt(event)" class="form-control{{ $errors->has('local_phone') ? ' is-invalid' : '' }}" name="local_phone" value="{{ old('local_phone') }}" >
                                @if ($errors->has('local_phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('local_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_invoice" class="col-md-4 col-form-label text-md-right">Empresa:</label>
                            <div class="col-md-6">
                                <input id="name_invoice" type="text" class="form-control" name="name_invoice" value="{{ old('name_invoice') }}">

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   

    function isNumberKeyInt(evt)
	{
    	var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode != 8 && charCode > 31 
			&& 	(charCode < 48 || charCode > 57))
		return false;
		return true;
	}  

</script>

@endsection
