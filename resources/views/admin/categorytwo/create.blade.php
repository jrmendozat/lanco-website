@extends('admin.template')

@section('content')
	
<div class="container text-center">
	<div class="page-header">
		<h1>
			<i class="fa fa-list-alt"></i>
			Clasificación por {{$config_quoteandsell->name_category_2}} <small>[Agregar clasificación]</small>
		</h1>
	</div>

   <div class="page-medium">
        @if (count($errors) > 0)
            @include('admin.partials.errors')
        @endif
       
        <form method="post" action="{{action('Admin\CategorytwoController@store')}}">
            @csrf
            <input name="_method" type="hidden" value="post">
            <div class="form-group">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" Value="" name="name">
            </div>
            <div class="form-group">
                <label for="description">Descripcion:</label>
                <input type="text" class="form-control" description="" value="" name="description">
            </div>   
            <div class="form-group">
                <label for="color">Color:</label>
                <input type="color" class="form-control" name="color" >
            </div>
            <div class="form-group">
                <button type="submit" name="Button" class="btn btn-primary">Guardar</button>
                <a href="{{ route('categorytwo.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        </form>    
    </div>
</div>

@stop	