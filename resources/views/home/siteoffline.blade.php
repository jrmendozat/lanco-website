@extends('layouts-desktop.template-off')

@section('content')

<div class="response text-center">
    <div class="page">
        <h2 class="text-danger"><i class="fas fa-exclamation-triangle"></i>Sitio web fuera de servicio</h2>
        @if(Auth::check())
            <h2 class="text-danger"><i class="fas fa-wrench"></i>Servicio en Mantenimineto</h2>
        @else
            <h2 class="text-danger"><a class="text-danger" href="{{ route('login') }}"><i class="fas fa-wrench"></i></a>Servicio en Mantenimineto</h2>
        @endif
        
    </div>    
    <hr>
    <div class="page">
        <h4>En estos momentos nos encontramos realizando actividades de mantenimiento,</h4>
        <h4>a nuestro servicio de tienda online</h4>
        <h4>El servicio sera restablecido a la brevedad, disculpe los inconvenientes causados</h4>
    </div>
    <hr>
    <div class="page">
        <h3 class="text-success">En {{$config_quoteandsell->company_name}} innovamos constantemente, para presterle un mejor servicio</h3>
    </div>
    <div class="page">
        @if(Auth::check()) 
            @can('IsCreator')
                <h3>{{ Auth::user()->user }}  ({{ Auth::user()->user_type }})</h3>
                <a class="btn btn-danger" href="{{ route('dashboard.index') }}">Panel Control</a>
            @elsecan('IsSuperAdmin')
                <h3>{{ Auth::user()->user }}  ({{ Auth::user()->user_type }})</h3>
                <a class="btn btn-danger" href="{{ route('dashboard.index') }}">Panel Control</a>
            @endcan
         
        @endif  
    </div>
</div>  

@stop  