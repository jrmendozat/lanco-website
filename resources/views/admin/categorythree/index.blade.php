@extends('admin.template')

@section('content')

	<div class="container text-center">
		<div class="page-header">
			<h1>
				<i class="fa fa-list-alt"></i>
				Clasificación por {{$config_quoteandsell->name_category_3}} <a href="{{ route('categorythree.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Clasificación</a>
			</h1>
		</div>
		<div class="page">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Editar</th>
							<th>Eliminar</th>
							<th>Nombre</th>
							<th>Descripción</th>
							<th>Color</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
							<tr>
							  	<td>
							  		<a href="{{action('Admin\CategorythreeController@edit', $category['id'])}}" class="btn btn-primary"><i class="far fa-edit"></a></td>
								</td>
                              	<td>
                  					<form action="{{action('Admin\CategorythreeController@destroy', $category['id'])}}" method="post">
            							@csrf
            							<input name="_method" type="hidden" value="DELETE">
            							<button onClick="return confirm('Eliminar registro?')" class="btn btn-danger" type="submit"> 
										   <i class="fas fa-eraser"></i>
										</button>
          							</form>
                			  	</td>
								<td>{{ $category->name }}</td>
								<td>{{ $category->description }}</td>
								<td>{{ $category->color }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
        <div class="container text-center">  
            <p><a class="btn btn-primary" href="{{ route('dashboard.index') }}">
               <i class="fa fa-chevron-circle-left"></i> Regresar</a></p>
        </div>
	</div>
	
@stop