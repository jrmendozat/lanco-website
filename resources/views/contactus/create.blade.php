@extends('layouts-desktop.app')

@section('content')
	
<div style="background: rgb(255,255,255); margin-top:50px;" class="response">
	
<div class="page-contactus">
     
    <div style="margin-top:5px" class="page-header">
	    <div class="row">
            <div class="col-md-2 text-center">
               
            </div>
            <div class="col-md-8 text-center">
                <h3 style="font-family: 'Montserrat', sans-serif; font-weight: 400; margin-top:10px">Solicitud de Información</h3>
            </div>
            <div class="col-md-2 text-center">
                <a href="{{ route('home') }}" type="button" style="margin-top:20px; border-radius:1em;" class="btn-primary btn"><i style="margin-right:5px" class="fas fa-home iconstyle7"></i>Regresar</a>
            </div>
            	
        </div> 
    </div>

    <div style="margin-bottom: 10px" class="pagetry text-center">
               
        <form method="post" action="{{action('ContactUsController@store')}}">
            @csrf
                       
            <input name="_method" type="hidden" value="post">
            <div class="form-group">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
            <div class="form-group">
                <label style="font-family: 'Open Sans', sans-serif; font-weight: 700" for="name">Nombre y Apellido:</label>
                <input id="name" type="text" class="form-control" Value="{{ old('name') }}" name="name">
            </div>
            <div class="form-group">
                <label style="font-family: 'Open Sans', sans-serif; font-weight: 700" for="name">Correo:</label>
                <input id="email" type="text" class="form-control" Value="{{ old('email') }}" name="email">
            </div>

            <div class="form-group">
                <label style="font-family: 'Open Sans', sans-serif; font-weight: 700" for="cell_phone">Nro. Teléfono Móvil</label>
                <input id="cell_phone" type="text" onkeypress="return isNumberKeyInt(event)" class="form-control" name="cell_phone" Value="{{ old('cell_phone') }}" required>
            </div>
            <div class="form-group">
                <label style="font-family: 'Open Sans', sans-serif; font-weight: 700" for="local_phone">Nro. Teléfono Local</label>
                <input id="local_phone" type="text" onkeypress="return isNumberKeyInt(event)" class="form-control" name="local_phone" Value="{{ old('local_phone') }}">
            </div>
            <div class="form-group">
                <label style="font-family: 'Open Sans', sans-serif; font-weight: 700" for="description">Observaciones</label>
                <textarea class="form-control" rows="2" id="description" name="description" Value="{{ old('description') }}"></textarea>
            </div>
            
            
            <div class="form-group text-center">
                <button type="submit" name="Button" style="border-radius:1em;  color:black;" class="btn btn-success">Enviar<i class="fas fa-paper-plane iconstyle2"></i></button>
            </div>
            
        </form>    
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

@stop	

