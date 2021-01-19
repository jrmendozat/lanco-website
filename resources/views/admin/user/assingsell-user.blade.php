@extends('admin.template')

@section('content')

<div class="response text-center">
    <div class="page-header">
        <h2 style="margin-top:5px"><i class="fa fa-user"></i> USUARIOS <small>[ Asignar Vendedor ]</small></h2>
    </div>
  
  @if (count($errors) > 0)
    @include('admin.partials.errors')
  @endif
  <div class="page-inputform-2">
    
    <hr>
      <h4>Cliente {{ $user->name }} {{ $user->last_name }}</h4>
    <hr>
    <form method="post" action="{{action('Admin\UserController@updateselluser', $id)}}">  
        @csrf
        <input name="_method" type="hidden" value="POST">
        <div class="form-group">
            <label for="seller_assigned" class='text-primary'>Vendedor Asignado:</label>
            {!! Form::select('seller_assigned', $seller, null, ['class' => 'form-control']) !!}
        </div>  
        <div class="form-group">
                <button type="submit" name="Button" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('user.index') }}" class="btn btn-warning">Cancelar</a>
        </div>    
    </form>       

    
  </div>
  

</div>

@stop 