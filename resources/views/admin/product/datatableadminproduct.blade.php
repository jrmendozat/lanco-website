@php
	$icon = $config_quoteandsell->Icon_typestore." ".'icon-nav-home1';
@endphp

<h2 class="text-center text-warning">Catálogo de Artículos </h2> 

<div class="table-responsive">
	<table id="example1" class="table  table-hover table-striped table-sm">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Slug</th>
				<th>Decripción</th>
				<th>Precio Por</th>
				<th>Presentación</th>
				<th>Precio</th>
				<th>Precio Mayor</th>
				<th>Stock</th>
				<th>Visible</th>
				<th>1/0</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
	</table>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		
		
<script>
	$('#example1').DataTable( {
		"processing": true,
		"serverSide": true,
		"language"  : {
						"url": '{!! asset('/locate/datatable/latino.json') !!}'
					} ,
		"ajax": {
			"url":"<?= route('dataProcessing2') ?>",
			"dataType":"json",
			"type":"POST",
			"data":{"_token":"<?= csrf_token() ?>"}
		},
		"columns":[
			{ data: 'id', name: 'id' },
			{ data: 'name', name: 'name' },
			{ data: 'slug', name: 'slug', "visible":false,},
			{ data: 'extract', name: 'extract' },
			{ data: 'unitPrice', name: 'unitPrice', "searchable":false,"orderable":false },
			{ data: 'product_presentation', name: 'product_presentation'  },
			{ data: 'price', name: 'price' },
			{ data: 'price_dealer', name: 'price_dealer' },
			{ data: 'stock', name: 'stock' },
			{ data: 'visible', name: 'visible' },
			
			{ data: null,   "searchable":false,"orderable":false, render: function ( data, type, row ) {
				return "<a href='{{ url('activeupdate') }}/"+ data.slug +"' class='btn btn-primary' ><i class='fas fa-exchange-alt'></i></i></button>" }
			},
			
			{ data: null,   "searchable":false,"orderable":false, render: function ( data, type, row ) {
				return "<a href='{{ url('admin/product/') }}/"+ data.slug +"/edit' class='btn btn-primary' ><i class='far fa-edit'></button>" }
			},
			

			{ data: null,  "searchable":false,"orderable":false, render: function ( data, type, row ) {
				return "<a href='{{ url('confirmdeleteproduct') }}/"+ data.slug +"' class='btn btn-danger' ><i class='fas fa-eraser'</i></button>" 
			},

			} 
		]
	} );
</script>
