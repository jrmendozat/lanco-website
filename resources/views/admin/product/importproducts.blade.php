@extends('admin.template')

@section('content')
	
<div class="response text-center">
	<div style="margin-top:5px" class="page-header">
		<h2><i class="fas fa-file-import"></i>PRODUCTOS <small>[Importar]</small></h2>
	</div>
    @if (count($errors) > 0)
        @include('admin.partials.errors')
    @endif
    <div class="page-inputform-2">
        <form method="post" action="{{ route('ImportProducts') }}" enctype="multipart/form-data">     
            @csrf
            <input name="_method" type="hidden" value="post">
            <div class="form-group">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
                <input type="file" name="file"  required>
               
            <div style="margin-top:30px" class="form-group">
                <button type="submit" name="Button" class="btn btn-primary">Importar</button>
                <a href="{{ route('product.index') }}" class="btn btn-warning">Cancelar</a>
            </div>    
        </form>    
    </div>
</div>

@stop    