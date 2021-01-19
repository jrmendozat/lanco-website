@extends('admin.template')

@section('content')
	
	<div class="response text-center">
		<div class="page-header">
			<h2 style="margin-top:10px">
				<i style="margin-right:10px" class="fa fa-shopping-cart"></i>
				PRODUCTOS <small>[Editar producto]</small>
			</h2>
		</div>
        @if (count($errors) > 0)
            @include('admin.partials.errors')
        @endif 
        <div class="page-inputform">
            <form method="post" action="{{action('Admin\ProductController@update', $product->slug)}}">
                @csrf
                <input name="_method" type="hidden" value="PUT">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel1">Datos Generales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel2">Clasificación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel3">Imagenes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel4">Fichas Técnicas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel5">Campos Adicionales</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="panel1" class="tab-pane active"><br>
                        <div class="row">
                            <div class="col-sm-6">
                                 <div class="form-group">
                                    <label for="name" class='text-primary'>Nombre:</label>
                                    <input id="name" type="text" class="form-control" Value= "{{ $product->name }}"  name="name">
                                </div>
                                <div class="form-group">
                                    <label for="partnumber" class='text-primary'>Número de Parte:</label>
                                    <input id="partnumber" type="text" class="form-control" Value="{{ $product->partnumber }}"  name="partnumber" placeholder="Si utiliza Nro. de parte / Ingreselo aqui">
                                </div>
                                <div class="form-group">
                                    <label for="sku" class='text-primary'>SKU:</label>
                                    <input id="sku" type="text" class="form-control" Value="{{ $product->sku }}"  name="sku" placeholder="Si utiliza(SKU) Unidad de Codificación en Almacen / Ingreselo aqui">
                                </div>
                                <div class="form-group">
                                    <label for="upc" class='text-primary'>UPC:</label>
                                    <input id="upc" type="text" class="form-control" Value="{{ $product->upc}}"  name="upc" placeholder="Si utiliza (UPC) Codificación uniforme de productos Código de Barras / Ingreselo aqui">
                                </div>
                                <div class="form-group">
                                    <label for="extract" class='text-primary'>Extracto:</label>
                                    <input id="extract" type="text" class="form-control" Value= "{{ $product->extract }}"  name="extract">
                                </div>
                                <div class="form-group">
                                    <label for="description" class='text-primary'>Descripción:</label>
                                    <input id="description" type="text" class="form-control" value="{{ $product->description }}" name="description">
                                    
                                </div>
                               
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="price" class='text-primary'>Precio Detal:</label>
                                            <input style="text-align: right" id="price" type="text" class="form-control" onkeypress="return isNumberKey(event)" value="{{ $product->price }}" name="price">
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="price_dealer" class='text-primary'>Precio Distribuidor/Mayorista:</label>
                                            <input style="text-align: right" id="price_dealer" type="text" class="form-control" onkeypress="return isNumberKey(event)" value="{{ $product->price_dealer }}" name="price_dealer">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="tax" class='text-primary'>Impuesto:</label>
                                            <input style="text-align: right" id="tax" type="text" class="form-control" onkeypress="return isNumberKey(event)" value="{{ $product->tax }}" name="tax">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5"> 
                                        <label for="product_presentation" class='text-primary'>Presentación:  </label>
                                        <div class="form-group">
                                            {!! Form::radio('product_presentation', '0', $product->product_presentation=='0' ? true : false) !!} Unidad 
                                            {!! Form::radio('product_presentation', '1', $product->product_presentation=='1' ? true : false) !!} Paquete
                                            {!! Form::radio('product_presentation', '2', $product->product_presentation=='2' ? true : false) !!} Detallado
                                            {!! Form::radio('product_presentation', '3', $product->product_presentation=='2' ? true : false) !!} C/U
                                            {!! Form::radio('product_presentation', '4', $product->product_presentation=='2' ? true : false) !!} 6 Unidades
                                        </div>
                                    </div>
                                    <div class="col-sm-5"> 
                                        <label for="unitPrice" class='text-primary'>Precio Por:  </label>
                                        <div class="form-group">
                                            {!! Form::radio('unitPrice', '0', $product->unitPrice=='0' ? true : false) !!} Por Unidad
                                            {!! Form::radio('unitPrice', '1', $product->unitPrice=='1' ? true : false) !!} Por Kg
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        @if($product->unitPrice='1')
                                            <div class="form-group">
                                                <label for="estimated_weight" class='text-primary'>Peso S/P:</label>
                                                <input style="text-align: right" id="estimated_weight" type="text" class="form-control" onkeypress="return isNumberKey(event)" value="{{ $product->estimated_weight }}" name="estimated_weight">
                                            </div>
                                        @endif  
                                    </div> 
                                </div> 
                                <div class="row">
                                    <div class="col-sm-4"> 
                                    </div>
                                    <div class="col-sm-4"> 
                                        <div class="form-group">
                                            <label for="stock" class='text-primary'>Stock:</label>
                                            <input style="text-align: right" id="stock" type="text" class="form-control" onkeypress="return isNumberKey(event)" value="{{ $product->stock }}" name="stock">
                                        </div>
                                    </div>
                                    <div class="col-sm-4"> 
                                    </div>
                                </div>
                                <div class="row">  
                                    <div class="col-sm-6"> 
                                        <div class="form-group">
                                            <label for="visible" class='text-primary'>Visible:</label>
                                            <input type="checkbox" name="visible" {{ $product->visible == 1 ? "checked='checked'" : '' }}>
                                        </div>
                                    </div>
                                    <div class="col-sm-6"> 
                                        <div class="form-group">
                                            <label for="vip" class='text-primary'>Vip:</label>
                                            <input type="checkbox" name="vip" {{ $product->vip == 1 ? "checked='checked'" : '' }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div id="panel2" class="container  tab-pane fade"><br>
                        @if($config_quoteandsell->enable_category_1 == "1") 
                            <div class="form-group">
                                <label for="category_id" class='text-primary'>{{$config_quoteandsell->name_category_1}}:</label>
                                {!! Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control']) !!}
                            </div>
                            @Endif 
                            @if($config_quoteandsell->enable_category_2 == "1") 
                                <div class="form-group">
                                    <label for="category_id" class='text-primary'>{{$config_quoteandsell->name_category_2}}:</label>
                                    {!! Form::select('categorytwo_id', $categoriestwo, null, ['class' => 'form-control']) !!}
                                </div>
                            @Endif
                            @if($config_quoteandsell->enable_category_3 == "1") 
                                <div class="form-group">
                                    <label for="category_id" class='text-primary'>{{$config_quoteandsell->name_category_3}}:</label>
                                    {!! Form::select('categorythree_id', $categoriesthree, null, ['class' => 'form-control']) !!}
                                </div>
                            @Endif
                            @if($config_quoteandsell->enable_category_4 == "1") 
                            <div class="form-group">
                                <label for="category_id" class='text-primary'>{{$config_quoteandsell->name_category_4}}:</label>
                                {!! Form::select('categoryfour_id', $categoriesfour, null, ['class' => 'form-control']) !!}
                            </div>
                            @Endif
                            @if($config_quoteandsell->enable_category_5 == "1") 
                                <div class="form-group">
                                    <label for="category_id" class='text-primary'>{{$config_quoteandsell->name_category_5}}:</label>
                                    {!! Form::select('categoryfive_id', $categoriesfive, null, ['class' => 'form-control']) !!}
                                </div>
                        @Endif
        
                    </div>
                    <div id="panel3" class="container  tab-pane fade"><br>
                        <div class="form-group">
                            <label for="image" class='text-primary'>Imagen #1:</label>
                            <input id="image" type="text" class="form-control" Value="{{ $product->image }}" name="image"> 
                        </div>
                        <div class="form-group">
                            <label for="image_1" class='text-primary'>Imagen #2:</label>
                            <input id="image_1" type="text" class="form-control" Value="{{ $product->image_2 }}" name="image_1"> 
                        </div>
                        <div class="form-group">
                            <label for="image_2" class='text-primary'>Imagen #3:</label>
                            <input id="image_2" type="text" class="form-control" Value="{{ $product->image_3 }}" name="image_2"> 
                        </div>
                        <div class="form-group">
                            <label for="image_3" class='text-primary'>Imagen #4:</label>
                            <input id="image_3" type="text" class="form-control" Value="{{ $product->image_4 }}" name="image_3"> 
                        </div>
                        <div class="form-group">
                            <label for="image_4" class='text-primary'>Imagen #5:</label>
                            <input id="image_4" type="text" class="form-control" Value="{{ $product->image_5 }}" name="image_4"> 
                        </div>
                    </div>
                    <div id="panel4" class="container  tab-pane fade"><br>
                        <div class="form-group">
                            <label for="title_sheet_1" class='text-primary'>Título Ficha Técnica #1:</label>
                            <input id="title_sheet_1" type="text" class="form-control" Value="{{ $product->title_sheet_1}}" name="title_sheet_1"> 
                        </div>
                        <div class="form-group">
                            <label for="data_sheet_1" class='text-primary'>Contenido Ficha Técnica #1:</label>
                            <textarea class="form-control" rows="5" id="data_sheet_1" name="data_sheet_1" >{{ $product->data_sheet_1 }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="title_download_1" class='text-primary'>Título Folleto/Documento Descargable #1:</label>
                            <input id="title_download_1" type="text" class="form-control" Value="{{ $product->title_download_1}}" name="title_download_1"> 
                        </div>
                        <div class="form-group">
                            <label for="download_1" class='text-primary'>Archivo Descargable #1:</label>
                            <input id="download_1" type="text" class="form-control" Value="{{ $product->download_1}}" name="download_1"> 
                        </div><hr>
                        <div class="form-group">
                            <label for="title_sheet_2" class='text-primary'>Título Ficha Técnica #2:</label>
                            <input id="title_sheet_2" type="text" class="form-control" Value="{{ $product->title_sheet_2}}" name="title_sheet_2"> 
                        </div>
                        <div class="form-group">
                            <label for="data_sheet_2" class='text-primary'>Contenido Ficha Técnica #2:</label>
                            <textarea class="form-control" rows="5" id="data_sheet_2" name="data_sheet_2" >{{ $product->data_sheet_2 }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="title_download_2" class='text-primary'>Título Folleto/Documento Descargable #2:</label>
                            <input id="title_download_2" type="text" class="form-control" Value="{{ $product->title_download_2}}" name="title_download_2"> 
                        </div>
                        <div class="form-group">
                            <label for="download_2" class='text-primary'>Archivo Descargable #2:</label>
                            <input id="download_2" type="text" class="form-control" Value="{{ $product->download_2}}" name="download_2"> 
                        </div><hr>
                        <div class="form-group">
                            <label for="title_sheet_3" class='text-primary'>Título Ficha Técnica #3:</label>
                            <input id="title_sheet_3" type="text" class="form-control" Value="{{ $product->title_sheet_3}}" name="title_sheet_3"> 
                        </div>
                        <div class="form-group">
                            <label for="data_sheet_3" class='text-primary'>Contenido Ficha Técnica #3:</label>
                            <textarea class="form-control" rows="5" id="data_sheet_3" name="data_sheet_3" >{{ $product->data_sheet_3 }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="title_download_3" class='text-primary'>Título Folleto/Documento Descargable #3:</label>
                            <input id="title_download_3" type="text" class="form-control" Value="{{ $product->title_download_3}}" name="title_download_3"> 
                        </div>
                        <div class="form-group">
                            <label for="download_3" class='text-primary'>Archivo Descargable #3:</label>
                            <input id="download_3" type="text" class="form-control" Value="{{ $product->download_3}}" name="download_3"> 
                        </div>
                   
                    </div>
                    <div id="panel5" class="container  tab-pane fade"><br>
                        @if($config_quoteandsell->enable_field_1 == "1") 
                        <div class="form-group">
                            <label for="field_1" class='text-primary'>{{$config_quoteandsell->name_field_1}}:</label>
                            <input id="field_1" type="text" class="form-control" value="{{ $product->field_1 }}" name="field_1">
                        </div>
                        @Endif
                       
                         @if($config_quoteandsell->enable_field_2 == "1") 
                        <div class="form-group">
                            <label for="field_2" class='text-primary'>{{$config_quoteandsell->name_field_2}}:</label>
                            <input id="field_2" type="text" class="form-control" value="{{ $product->field_1 }}" name="field_2">
                        </div>
                        @Endif

                        @if($config_quoteandsell->enable_field_3 == "1") 
                        <div class="form-group">
                            <label for="field_3" class='text-primary'>{{$config_quoteandsell->name_field_3}}:</label>
                            <input id="field_3" type="text" class="form-control" value="{{ $product->field_1 }}" name="field_3">
                        </div>
                        @Endif

                           @if($config_quoteandsell->enable_field_4 == "1") 
                        <div class="form-group">
                            <label for="field_4" class='text-primary'>{{$config_quoteandsell->name_field_4}}:</label>
                            <input id="field_4" type="text" class="form-control" value="{{ $product->field_1 }}" name="field_4">
                        </div>
                        @Endif

                           @if($config_quoteandsell->enable_field_5 == "1") 
                        <div class="form-group">
                            <label for="field_5" class='text-primary'>{{$config_quoteandsell->name_field_5}}:</label>
                            <input id="field_5" type="text" class="form-control" value="{{ $product->field_1 }}" name="field_5">
                        </div>
                        @Endif
                    </div>    

                </div>
               
                <div class="form-group">
                    <button type="submit" name="Button" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('product.index') }}" class="btn btn-warning">Cancelar</a>
                </div>    
            </form> 
        </div>
    </div>
  

    <script>

	 function isNumberKey(evt)
	  {
        
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode != 8 && charCode != 44 && charCode > 31 
			&& (charCode < 48 || charCode > 57))
		return false;
		return true;
	  }  

      function isNumberKeyInt(evt)
	  {
        
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode != 8 && charCode > 31 
			&& 	(charCode < 48 || charCode > 57))
		return false;
		return true;
	  }  

	</script>

@stop
