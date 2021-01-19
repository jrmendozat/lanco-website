@extends('admin.template')

@section('content')
<hr>
	<div class="container text-center">
		<div class="page-header">
			<h1>
				<i class="fa fa-shopping-cart"></i>
				PRODUCTOS 
				<a href="{{ route('product.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Producto</a>
				
                <a href="{{ route('product.loadimport') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Importar</a>
                <a href="{{ route('product.export') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Exportar</a>
				
			</h1>
        </div>
    </div>    
		<div class="page-width">
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Eliminar</th>
                            <th class="text-cente">Imagen</th>
                            <th class="text-left">Nombre</th>
                            <th class="text-left">Categoría</th>
                            <th class="text-right">Precio</th>
                            <th class="text-center">Unidad</th>
                            <th class="text-right">Precio Por</th>
                            <th class="text-right">Peso Estimado</th>
                            <th class="text-right">Stock</th>
                            <th class="text-center">Visible</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td style="width:50px" class="text-center">
                                    <a href="{{ route('product.edit', $product->slug) }}" class="btn btn-primary">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </td>
                                <td style="width:50px" class="text-center">
                                   <form action="{{action('Admin\ProductController@destroy', $product->slug)}}" method="post">
            							@csrf
            							<input name="_method" type="hidden" value="DELETE">
            							<button onClick="return confirm('Eliminar registro?')" class="btn btn-danger" type="submit"> 
										   <i class="fas fa-eraser"></i>
										</button>
          							</form>
                                <td style="width:50px"><img src="{{ $product->image }}" width="60"></td>
                                <td style="width:300px">{{ $product->name }}</td>
                                <td style="width:200px">{{ $product->category->name }}</td>
                                <td style="width:150px" class="text-right">Bs. {{ number_format($product->price,2) }}</td>
                                 
                                @switch($product->product_presentation)
                                    @case("0")
                                       <td style="width:100px" class="text-center">Unidad</td>
                                    @break
                                    @case("1")
                                       <td style="width:100px" class="text-center">Paquete</td>
                                    @break
                                     @case("2")
                                        <td style="width:100px" class="text-center">Detallado</td>
                                    @break
                                    @default
                                        <td style="width:100px" class="text-center">No definido</td>
                                 @endswitch 
                               
                                
                                 @switch($product->unitPrice)
                                    @case("0")
                                        <td style="width:80px" class="text-center">Unidad</td>
                                    @break
                                    @case("1")
                                        <td style="width:80px" class="text-center">Kg</td>
                                    @break
                                    @default
                                        <td style="width:80px" class="text-center">No definido</td>
                                 @endswitch

                                 @if(($product->unitPrice == "1"))
                                    <td style="width:100px" class="text-right">{{$product->estimated_weight}} Kg</td>
                                 @Else
                                   <td style="width:100px" class="text-right">N/A</td>
                                 @Endif
                                  
                                
                                
                                
                                <td style="width:80px" class="text-right">{{ number_format($product->stock,2) }}</td>
                                <td style="width:80px" class="text-center" >{{ $product->visible == 1 ? "Si" : "No" }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <hr>
            
            <?php echo $products->render(); ?>
            
        </div>
        <div class="container text-center">  
            <p><a class="btn btn-primary" href="{{ route('dashboard.index') }}">
               <i class="fa fa-chevron-circle-left"></i> Regresar</a></p>
        </div>
	
	
@stop
