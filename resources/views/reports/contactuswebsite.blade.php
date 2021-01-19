@extends('layouts-desktop.template-datatable')

@section('content')

<div style="margin-top:60px; padding:1em;" class="text-center">
    <h2>Listado de Contactos Registrados</h2>
	<div class="page-datatable">
	   	<div class="row">
           	<div class="col-md-12">
           		<table id="dataClients" class="table-responsive-sm table-hover table-striped">
					<thead style="background:rgb(29,79,145); color:White">
						<tr>
                            <th>CreateAt</th>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Telf. Movil</th>
							<th>Telf. Local</th>
							<th>Observaciones</th>
	    					
						</tr>
					</thead>
				</table>
           	</div>
        </div>
    </div>
    <a href="{{ route('home') }}" class="btn btn-warning" style="margin-bottom:20px">Regresar</a>
</div>


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
	$('#dataClients').DataTable( {
        "dom": 'Bfrtip',
        "buttons": ['copy', 'excel', 'pdf', 'csv', 'print' ],
		"processing": true,
		"serverSide": true,
		"language"  : {
            "url": '{!! asset('/locate/datatable/latino.json') !!}'
            } ,
		"ajax": {
			"url":"<?= route('dtcontactUsWebSiteProcessing') ?>",
			"dataType":"json",
			"type":"POST",
			"data":{"_token":"<?= csrf_token() ?>"}
			},
		"columns":[
			
		    { data: 'created_at', name: 'created_at' },
			{ data: 'name', name: 'name' },
			{ data: 'email', name: 'email' },
            { data: 'cellphone', name: 'cellphone' },
            { data: 'localphone', name: 'localphone' },
            { data: 'description', name: 'description' }
           
            
            ]
			} );
	</script>


@stop
