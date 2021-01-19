@extends('admin.template')

@section('content')
    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-user"></i> USUARIOS
                <a href="{{ route('user.create') }}" class="btn btn-warning">
                    <i class="fa fa-plus-circle"></i> Usuario
                </a>
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
                            <th>Apellidos</th>
                            <th>Correo</th>
                            <th>Tipo <a href="{{ asset('docs/UserRoles.pdf') }}" target="_blank" class="btn btn-info"><i class="fas fa-info"></i></a></th>
                            <th>Activo</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach($users as $user)
                           @if($user->last_name == 'AuthCheck' or  $user->user_type == 'createmode')
                                @can('IsCreator')
                                    <tr>
                                        <td>
                                            <a href="{{ route('user.edit', $user) }}" class="btn btn-primary"><i class="far fa-edit"></i></a>
                                        </td>
                                        <td>
                                        {!! Form::open(['route' => ['user.destroy', $user]]) !!}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger"><i class="fas fa-eraser"></i></button>
                                        {!! Form::close() !!}
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->user_type }}</td>
                                        <td>{{ $user->active == 1 ? "Si" : "No" }}</td>
                                    </tr>
                                @endcan
                           @else
                                <tr>
                                    <td>
                                        <a href="{{ route('user.edit', $user) }}" class="btn btn-primary"><i class="far fa-edit"></i></a>
                                    </td>
                                    <td>
                                    {!! Form::open(['route' => ['user.destroy', $user]]) !!}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger"><i class="fas fa-eraser"></i></button>
                                    {!! Form::close() !!}
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->user_type }}</td>
                                    <td>{{ $user->active == 1 ? "Si" : "No" }}</td>
                                </tr>
                           @endif

                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <hr>
            
            <?php echo $users->render(); ?>
            
        </div>
        <div class="container text-center">  
            <p><a class="btn btn-primary" href="{{ route('dashboard.index') }}">
               <i class="fa fa-chevron-circle-left"></i> Regresar</a></p>
        </div>
    </div>
@stop


