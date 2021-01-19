@extends('admin.template')

@section('content')

<div class="response text-center">
    <div class="page-header">
        <h2 style="margin-top:5px"><i class="fa fa-user"></i> USUARIOS <small>[ Editar usuario ]</small></h2>
    </div>
    @if (count($errors) > 0)
        @include('admin.partials.errors')
    @endif
    <div class="page-inputform">
        <form method="post" action="{{action('Admin\UserController@update', $id)}}">  
            @csrf
            <input name="_method" type="hidden" value="PUT">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#panel1">Datos Generales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel2">Datos Facturación</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="panel1" class="container tab-pane active"><br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name" class='text-primary'>Nombre:</label>
                                <input type="text" class="form-control" Value="{{ $user->name }}" name="name" placeholder="Ingresa el nombre... (Obligatorio)" autofocus="autofocus">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="last_name" class='text-primary'>Apellido:</label>
                                <input type="text" class="form-control" Value="{{ $user->last_name }}" name="last_name" placeholder="Ingresa el apellido..." >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email" class='text-primary'>Correo Eléctronico:</label>
                                <input type="email" class="form-control" Value="{{ $user->email }}" name="email" placeholder="Ingresa el correo... (Obligatorio)" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="user_type" class='text-primary'>Tipo Usuario:</label>
                                {{ Form::select('user_type', array('user' => 'Cliente', 'sell' => 'Vendedor', 'dealer' => 'Distribuidor/Mayorista', 'admin-A' => 'Administrador Nivel A', 'admin-B' => 'Administrador Nivel B', 'admin-C' => 'Administrador Nivel C', 'admin-D' => 'Administrador Nivel D'), $user->user_type, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="cell_phone" class="text-primary">Nro. Teléfono Móvil</label>
                                <input id="cell_phone" type="text" onkeypress="return isNumberKeyInt(event)" class="form-control" name="cell_phone"  Value="{{ $user->cell_phone }}" placeholder="Nro Telefóno móvil... (Obligatorio)" required>
                                @if ($errors->has('cell_phone'))
                                    <span role="alert">
                                        <strong>Error: Número Teléfono invalido o ya registrado con otro usuario</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="local_phone" class="text-primary">Nro. Teléfono Local</label>
                                <input id="local_phone" type="text" onkeypress="return isNumberKeyInt(event)" class="form-control{{ $errors->has('local_phone') ? ' is-invalid' : '' }}" name="local_phone" Value="{{ $user->local_phone }}" placeholder="Nro Telefóno fijo... (Obligatorio)" >
                                @if ($errors->has('local_phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('local_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password" class="text-primary">{{ __('Clave') }}</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" Value="{{ $user->password }}" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password-confirm" class="text-primary">{{ __('Confirme Clave') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" Value="{{ $user->password }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-check-inline">
                                <label for="active" class="form-check-label text-primary">
                                    <input type="checkbox" name="active" class="form-check-input" {{ $user->active == 1 ? "checked='checked'" : '' }}>Activo:
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-check-inline">
                                    <label for="vip" class="form-check-label text-primary">
                                        <input type="checkbox" name="vip" class="form-check-input" {{ $user->vip == 1 ? "checked='checked'" : '' }}>VIP:
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel2" class="container tab-pane fade"><br>
                    <div class="form-group">
                        <label for="address" class='text-primary'>Dirección:</label>
                        <textarea class="form-control" rows="3" id="address" name="address" Value="{{ $user->address }}" placeholder="Dirección..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="name_invoice" class="text-primary">Factura a Nombre:</label>
                        <input type="text" class="form-control" Value="" name="name_invoice" Value="{{ $user->name_invoice }}" placeholder="Facturar a Nombre de ..." >
                    </div>
                    <div class="form-group">
                        <label for="rif_Invoice" class="text-primary">Rif:</label>
                        <input type="text" class="form-control" Value="" name="rif_Invoice" Value="{{ $user->rif_Invoice }}" placeholder="Rif ..." >
                    </div>
                    <div class="form-group">
                        <label for="adress_invoice" class="text-primary">Direccion Factura:</label>
                        <input type="text" class="form-control" Value="" name="adress_invoice" Value="{{ $user->adress_invoice }}" placeholder="Direccion Fiscal" >
                    </div>
                    
                </div>
            </div>
                         
            <div class="form-group">
                <button type="submit" name="Button" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('user.index') }}" class="btn btn-warning">Cancelar</a>
            </div>    
        </form>       
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
    
@stop


