@extends('admin.template')

@section('content')

<div class="page-inputform">
	<div class="response text-center">
		<div class="page-header">
			<h1>
				<a href="{{ route('product.create') }}" class="btn btn-primary"><i style="margin-right:5px" class="fa fa-plus-circle"></i> Producto</a>
				<a href="{{ route('product.loadimport') }}" class="btn btn-success"><i style="margin-right:5px" class="fa fa-plus-circle"></i> Importar</a>
				<a href="{{ route('ExportProducts') }}" class="btn btn-success"><i style="margin-right:5px" class="fa fa-plus-circle"></i> Exportar Full</a>
				<a href="{{ route('ExportLanco') }}" class="btn btn-success"><i style="margin-right:5px" class="fa fa-plus-circle"></i> Exportar Lanco</a>
				<a href="{{ route('ExportPriceList') }}" class="btn btn-success"><i style="margin-right:5px" class="fa fa-plus-circle"></i> Exportar Lista Precio</a>
				@can('IsCreator') 
					<a href="{{ route('product.deleteall') }}" onclick="return confirm('¿Esta Usted Seguro?, la acción no se puede revertir')" class="btn btn-danger" ><i style="margin-right:5px" class="fa fa-trash"></i>Eliminar Todo</a>
          		@endcan
          		@can('IsSuperAdmin') 
				  <a href="{{ route('product.deleteall') }}" onclick="return confirm('¿Esta Usted Seguro?, la acción no se puede revertir')" class="btn btn-danger" ><i style="margin-right:5px" class="fa fa-trash"></i>Eliminar Todo</a>
          		@endcan
				
				
			</h1>
        </div>
    </div>    
    @include('admin.product.datatableadminproduct')
	<div class="container text-center">  
        <p><a class="btn btn-warning" href="{{ route('dashboard.index') }}">
            <i class="fa fa-chevron-circle-left"></i> Regresar</a></p>
    </div>
</div> 



@stop    