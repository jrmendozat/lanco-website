@extends('admin.template')

@section('content')


<div class="container text-center">
    <div style="margin-top:20px" class="page-header">
        <h1><i class="fa fa-rocket"></i> {{$config_quoteandsell->company_name}} - Panel de Administración</h1>
    </div>
        
    <h2>Bienvenido(a) {{ Auth::user()->user }} al Panel de administración de tu tienda en línea.</h2><hr>

    <div class="row">
        
        <div class="col-md-4">
            <div class="panel">
                <i class="fa fa-list-alt icon-home"></i>
                <div class="conteiner">
                    <div class="row">
                        <div class="col-md-3">
                            @if($config_quoteandsell->enable_category_1 == "1")
                            <a href="{{ route('category.index') }}" data-toggle="tooltip" title="{{$config_quoteandsell->name_category_1}}" class="btn btn-warning btn-home-admin-cat">#1</a>
                            @else
                            <fieldset disabled>
                                <a href="#" class="btn btn-warning btn-home-admin-cat">#1</a>
                            </fieldset> 
                            @endif   
                        </div>  
                        <div class="col-md-3">
                        @if($config_quoteandsell->enable_category_2 == "1")
                            <a href="{{ route('categorytwo.index') }}" data-toggle="tooltip" title="{{$config_quoteandsell->name_category_2}}" class="btn btn-warning btn-home-admin-cat">#2</a>
                        @else
                            <fieldset disabled>
                                <a href="#" class="btn btn-warning btn-home-admin-cat">#2</a>
                            </fieldset> 
                        @endif    
                        </div>
                        <div class="col-md-3">
                            @if($config_quoteandsell->enable_category_3 == "1")
                            <a href="{{ route('categorythree.index') }}" data-toggle="tooltip" title= "{{$config_quoteandsell->name_category_3}}" class="btn btn-warning  btn-home-admin-cat">#3</a>
                        @else
                            <fieldset disabled>
                                <a href="#" class="btn btn-warning btn-home-admin-cat">#3</a>
                            </fieldset> 
                        @endif  
                        </div>
                        
                        <div class="col-md-3">
                            @if($config_quoteandsell->enable_category_4 == "1")
                            <a href="{{ route('categoryfour.index') }}" data-toggle="tooltip" title="{{$config_quoteandsell->name_category_4}}" class="btn btn-warning btn-home-admin-cat">#4</a>
                        @else
                            <fieldset disabled>
                                <a href="#" class="btn btn-warning btn-home-admin-cat">#4</a>
                            </fieldset> 
                        @endif  
                        
                        </div>
                        
                    </div> 
                </div>
            </div>    
        </div>
            
        <div class="col-md-4">
            <div class="panel">
                <i class="fas fa-dolly-flatbed  icon-home"></i>
                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
            </div>
        </div>
            
        <div class="col-md-4">
            <div class="panel">
                <i class="fas fa-cubes icon-home"></i>
                <a href="{{ route('reports-contactUswebsite') }}" class="btn btn-warning btn-block btn-home-admin">CONTACTOS</a>
            </div>
        </div>
    </div><hr>
    
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-4">
            <div class="panel">
                <i class="fa fa-cogs icon-home"></i>
                <a href="{{ route('config_quoteandsell.index') }}" class="btn btn-warning btn-block btn-home-admin">AJUSTES GENERALES</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel">
                <i class="fas fa-folder-open icon-home"></i>
                <a href="{{ route('filemanager.index') }}" class="btn btn-warning btn-block btn-home-admin">Manejo de Archivos</a>
            </div>
        </div>
        <div class="col-md-2">
        </div>
        
    </div>
</div><hr>
             
@stop
