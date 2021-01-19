<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class DatatableProductController extends Controller
{
    //
	
	public function getProducts_store(Request $request){

		//print_r($request->all());
		$columns = array(
			0 => 'partnumber',
			1 => 'name',
			2 => 'slug',
			3 => 'description',  
			4 => 'extract',
			5 => 'product_presentation',
			6 => 'Stock',
			7 => 'price',
			8 => 'action',
			
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
							->orWhere('partnumber','like',"%{$search}%")
							->orWhere('description','like',"%{$search}%")
							->orWhere('extract','like',"%{$search}%")
							->offset($start)
							->limit($limit)
							->orderBy($order, $dir)
							->get();
			$totalFiltered = Product::where('name', 'like', "%{$search}%")
							->orWhere('partnumber','like',"%{$search}%")
							->orWhere('description','like',"%{$search}%")
							->orWhere('extract','like',"%{$search}%")
							->count();
		}		
					
		$data = array();
		
		if($posts){
			foreach($posts as $r){
			
				$nestedData['name'] = $r->name;
				$nestedData['slug'] = $r->slug;
				$nestedData['partnumber'] = $r->partnumber;
				$nestedData['description'] = $r->description;
				$nestedData['extract'] = $r->extract;
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
				$nestedData['price'] =  number_format($r->price,2);  
				$nestedData['stock'] =  number_format($r->stock,2);  				
				$nestedData['action'] = '';
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



	public function getproducts_searchproducts(Request $request){

		//print_r($request->all());
		$columns = array(
			0 => 'partnumber',
			1 => 'name',
			2 => 'slug',
			3 => 'description',  
			4 => 'extract',
			5 => 'data_sheet_1',
			6 => 'category_id',
			7 => 'action',
			
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
							->orWhere('partnumber','like',"%{$search}%")
							->orWhere('description','like',"%{$search}%")
							->orWhere('extract','like',"%{$search}%")
							->orWhere('data_sheet_1','like',"%{$search}%")
							->offset($start)
							->limit($limit)
							->orderBy($order, $dir)
							->get();
			$totalFiltered = Product::where('name', 'like', "%{$search}%")
							->orWhere('partnumber','like',"%{$search}%")
							->orWhere('description','like',"%{$search}%")
							->orWhere('extract','like',"%{$search}%")
							->orWhere('data_sheet_1','like',"%{$search}%")
							->count();
		}		
					
		$data = array();
		
		if($posts){
			foreach($posts as $r){
			
				$nestedData['name'] = $r->name;
				$nestedData['slug'] = $r->slug;
				$nestedData['partnumber'] = $r->partnumber;
				$nestedData['description'] = $r->description;
				$nestedData['extract'] = $r->extract;
				$nestedData['data_sheet_1'] = $r->data_sheet_1;
				switch($r->category_id) {
				   Case "1":
					  $nestedData['category_id'] = "Repuestos";
					  break;
					Case "2":
					  $nestedData['category_id'] = "Alquiler";
					  break;
					Case "3": 
					  $nestedData['category_id'] = "Equipos Nuevos";
					  break;  
					Case "4": 
					  $nestedData['category_id'] = "Equipos Usados";
					  break;  
					Case "4": 
					  $nestedData['category_id'] = "Plantas";
					  break; 
					Case "5": 
					  $nestedData['category_id'] = "Servicios";
					  break; 
				    
				}
				  				
				$nestedData['action'] = '';
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
