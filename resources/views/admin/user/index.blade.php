@extends('admin.template')

@section('content')

<div class="page-inputform">
	<div class="response text-center">
		<div class="page-header">
			<h1>
				<a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Usuario</a>

				<!--
				<a href="" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Importar</a>
				<a href="" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Exportar</a>
				-->
								
				
			</h1>
        </div>
    </div>    
    @include('admin.user.datatableadminuser')
	<div class="container text-center">  
        <p><a class="btn btn-warning" href="{{ route('dashboard.index') }}">
            <i class="fa fa-chevron-circle-left"></i> Regresar</a></p>
    </div>
</div> 



@stop    