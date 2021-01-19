
<h1>{{$name_to_assing}}</h1>

<input type="hidden" id="name_to_assing" name="name_to_assing" value="{{ $name_to_assing }}">
<input type="text"	value="{{ $id_product }}" id="id_product">

<a href="javascript:doassing('{{ $id_product }}')" title="Asignar">
    <i class="fa fa-arrows-h"></i>
</a>


<a 
	href="#" 
	class="btn btn-warning btn-doassing"
	data-href="{{ route('doassingfile',$name_to_assing) }}"
    data-id = "{{ id_product }}">
</a>
