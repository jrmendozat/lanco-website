@extends('admin.template')

@section('content')
	
<div class="container text-center">
	<div class="page-header">
		<h1>
			<i class="fa fa-list-alt"></i>
			Clasificación por {{$config_quoteandsell->name_category_15} <small>[Editar clasificación]</small>
		</h1>
	</div>

    <div class="page-medium">
        @if (count($errors) > 0)
            @include('admin.partials.errors')
        @endif
        
        <form method="post" action="{{action('Admin\CategoryfiveController@update', $id)}}">
            @csrf
            <input name="_method" type="hidden" value="PUT">
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input id="name" type="text" class="form-control" Value= "{{ $id->name }}"  name="name">
            </div>
            <div class="form-group">
                <label for="description">Descripcion:</label>
                <input id="description" type="text" class="form-control" value="{{ $id->description }}" name="description">
            </div>   
            <div class="form-group">
                <label for="color">Color:</label>
                <input type="color" class="form-control" value="{{ $id->color }}" name="color" >
            </div>
            <div class="form-group">
                <button type="submit" name="Button" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('categoryfive.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        </form>    
    </div>
</div>

@stop	