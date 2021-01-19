
	<div class="response text-center">
	    
		<div id="products-sm">
			@foreach($products as $product)
				<div class="product white-panel-sm">
					
					<h4 style="font-family: 'Montserrat', sans-serif; font-weight: 700; color:black; min-height: 25px;">{{ $product->name }}</h4>
					
					<h3 style="font-family: 'Montserrat', sans-serif; font-weight: 700; color:black;">{{ $product->sku }}</h3>

					<a href="{{ route('product-detail', [$product->slug, $categoryselect, $categorytwoselect] ) }}"><img class="img-fluid" src="{{URL::asset($product->image)}}" width="80%" alt="Card image"></a>
								
					<br>
				</div>
			@endforeach
		</div>
		{!! $products->links() !!}
	</div>
	


<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

