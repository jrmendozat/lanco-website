@php
	$icon = $config_quoteandsell->Icon_typestore." ".'icon-nav-home1';
@endphp

<h2 class="text-center text-warning">Listado de Usuarios </h2> 

<div class="table-responsive">
	<table id="example1" class="table  table-hover table-striped table-sm">
		<thead>
			<tr>
				<th>id</th> 
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Correo</th>
				<th>Telf. Movil</th>
				<th>Tipo</th>
				<th>Vendedor</th>
				<th>Activo</th>
				<th>VIP</th>
				<th>Asignar</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
	</table>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		
		
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

<script>
	$('#example1').DataTable( {
		"processing": true,
		"serverSide": true,
		"language"  : {
						"url": '{!! asset('/locate/datatable/latino.json') !!}'
					} ,
		"ajax": {
			"url":"<?= route('dataProcessing3') ?>",
			"dataType":"json",
			"type":"POST",
			"data":{"_token":"<?= csrf_token() ?>"}
		},
		"columns":[
			{ data: 'id', name: 'id', },
			{ data: 'name', name: 'name' },
			{ data: 'last_name', name: 'last_name'},
			{ data: 'email', name: 'email' },
			{ data: 'cell_phone', name: 'cell_phone' },
			{ data: 'user_type', name: 'user_type' },
			{ data: 'seller_assigned', name: 'seller_assigned' },
			{ data: 'active', name: 'active', "searchable":false },
			{ data: 'vip', name: 'vip', "searchable":false },
			
			{ data: null,   "searchable":false,"orderable":false, render: function ( data, type, row ) {
				return "<a href='{{ url('assingselltouser') }}/"+ data.id +"' class='btn btn-success' ><i class='far fa-edit'></button>" }
			},
			
			{ data: null,   "searchable":false,"orderable":false, render: function ( data, type, row ) {
				return "<a href='{{ url('admin/user/') }}/"+ data.id +"/edit' class='btn btn-primary' ><i class='far fa-edit'></button>" }
			},
			

			{ data: null,  "searchable":false,"orderable":false, render: function ( data, type, row ) {
				return "<a href='{{ url('confirmdeleteuser') }}/"+ data.id +"' class='btn btn-danger' ><i class='fas fa-eraser'</i></button>" 
			},

			} 
		]
	} );
</script>


<!--
	{ data: null,   "searchable":false,"orderable":false, render: function ( data, type, row ) {
				return "<a href='{{ url('assingselltouser') }}/"+ data.id +"' class='btn btn-success' ><i class='fas fa-eraser'</i></button>" 
			},
			
-->
