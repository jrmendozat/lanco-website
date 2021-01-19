@extends('admin.template')

@section('content')

<div class="response text-center">
	<div class="page-header">
		<h1 style="color:orange; margin-top:10px;">
      <i class="fa fa-cogs"></i>
     		Ajuste / Tienda
		</h1>
	</div>
	
  <div class="page">
    @if (count($errors) > 0)
      @include('admin.partials.errors')
    @endif

    <form method="post" action="{{action('Admin\ConfigController@update', $config_quoteandsell)}}">
        @csrf
        <input name="_method" type="hidden" value="PUT">
        <div style="font-size:40px" class="form-group"> 
		      <label  for="Active_site">Sitio Web Activo:</label> 
	  	    <input  type="checkbox" name="Active_site" {{ $config_quoteandsell->Active_site == 1 ? "checked='checked'" : '' }}>
	      </div>	
		    <div style="font-size:40px" class="form-group"> 
			    <label for="Active_store">Funciones Ventas / Cotizar Activos:</label> 
		  	  <input type="checkbox" name="Active_store" {{ $config_quoteandsell->Active_store == 1 ? "checked='checked'" : '' }}>
		    </div>
	      <div class="form-group">
          <button type="submit" name="Button" class="btn btn-primary">Actualizar</button>
          <a href="{{ route('dashboard.index') }}" class="btn btn-warning">Cancelar</a>
        </div>
    </form> 
  </div>
</div>  
@stop       