@extends('admin.template')

@section('content')

<div class="container text-center">
  
  @if (count($errors) > 0)
    @include('admin.partials.errors')
  @endif
  <div class="page-small">
    <H3>Desea Eliminar el Producto? </H3>
    <hr>
      <h4>{{ $id }}</h4>
    <hr>
    <a href="{{ route('user.index') }}" class="btn btn-warning">Cancelar</a>
    <a href="{{ url('deleteproduct') }}/{{ $id }}" class="btn btn-danger">Aceptar</a>
  </div>
  

</div>

@stop 