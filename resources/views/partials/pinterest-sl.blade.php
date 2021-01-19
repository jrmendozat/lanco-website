
	<div class="response text-center">
	 
		<div id="products-sl">
			@foreach($products as $product)
				<div class="product white-panel-sl">
					<h4 style="font-family: 'Montserrat', sans-serif; font-weight: 700; color:black; min-height: 25px;">{{ $product->name }}</h4>
					<h3 style="font-family: 'Montserrat', sans-serif; font-weight: 700; color:black;">{{ $product->sku }}</h3>
					<a href="{{ route('product-detail', [$product->slug, $categoryselect, $categorytwoselect] ) }}"><img class="img-fluid" src="{{URL::asset($product->image)}}" width="50%" alt="Card image"></a>
					<br>
					
				</div>
			@endforeach
		</div>
		<div style="margin-top:10px">
			{!! $products->links() !!}
		</div>
	</div>
	


<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

