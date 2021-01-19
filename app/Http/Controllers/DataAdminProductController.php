<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class DataAdminProductController extends Controller
{
    //
	
	public function getProducts(Request $request){

		
		//print_r($request->all());
		$columns = array(
			0   => 'id',
			1 	=> 'partnumber',
			2 	=> 'name',
		  	3 	=> 'slug',
			4 	=> 'extract',
			5	=> 'category_id',
			6 	=> 'unitPrice',
			7 	=> 'product_presentation',
			8 	=> 'price',
			9 	=> 'tax',
			10 	=> 'tax',
			11 	=> 'stock',
			12 	=> 'action',
      		13 	=> 'action2',
      		14 	=> 'action3',
	
		);
		
		$totalData = Product::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$posts = Product::offset($start)
					->limit($limit)
					->orderBy($order,$dir)
					->get();
			$totalFiltered = Product::count();
		}else{
			$search = $request->input('search.value');
			$posts = Product::where('name', 'like', "%{$search}%")
							->orWhere('id','like',"%{$search}%")
							->orWhere('partnumber','like',"%{$search}%")
							->orWhere('slug','like',"%{$search}%")
							->orWhere('extract','like',"%{$search}%")
							->orWhere('price','like',"%{$search}%")
							->orWhere('tax','like',"%{$search}%")
                            ->orWhere('visible','like',"%{$search}%")
							->offset($start)
							->limit($limit)
							->orderBy($order, $dir)
							->get();
			$totalFiltered = Product::where('name', 'like', "%{$search}%")
							->orWhere('slug','like',"%{$search}%")
							->orWhere('id','like',"%{$search}%")
							->orWhere('partnumber','like',"%{$search}%")
							->orWhere('extract','like',"%{$search}%")
							->orWhere('price','like',"%{$search}%")
							->orWhere('tax','like',"%{$search}%")
							->orWhere('visible','like',"%{$search}%")
							->count();
		}		
					
		
		$data = array();
		
		if($posts){
			foreach($posts as $r){
				$nestedData['id'] = $r->id;
				$nestedData['partnumber'] = $r->partnumber;
				$nestedData['category_id'] = $r->category_id;
				$nestedData['name'] = $r->name;
				$nestedData['slug'] = $r->slug;
				$nestedData['extract'] = $r->extract;
				if($r->unitPrice == "1") {
				  $nestedData['unitPrice'] = "Kg";
				} Else {
				  $nestedData['unitPrice'] = "Unidad";	  
				}
				switch($r->product_presentation) {
				   Case "0":
					  $nestedData['product_presentation'] = "Unidad";
					  break;
					Case "1":
					  $nestedData['product_presentation'] = "Paquete";
					  break;
					Case "2": 
					  $nestedData['product_presentation'] = "Detallado";
					  break;  
				    
				}
				$nestedData['price']		= $r->price;  
				$nestedData['tax']			= $r->tax;  
				$nestedData['stock']		= $r->stock;  
				$nestedData['visible']	= $r->visible;  
				$nestedData['action']  	= '';
        		$nestedData['action2']	= '';
        		$nestedData['action3']	= '';
				
				
				$data[] = $nestedData;
			}
		}
		
		$json_data = array(
			"draw"			=> intval($request->input('draw')),
			"recordsTotal"	=> intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"			=> $data
		);
		
		echo json_encode($json_data);
	}
}
