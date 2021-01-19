<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;

class DataTableReportsController extends Controller
{
   
	//
    public function getcontactUswebsite(Request $request){

	 //print_r($request->all());
	 $columns = array(
		0 => 'created_at',
		1 => 'name',
		2 => 'email',
		3 => 'cellphone',  
		4 => 'localphone',
		5 => 'description',
		 
	 );    
		
	 $totalData = Contacts::count();
	 $limit = $request->input('length');
	 $start = $request->input('start');
	 $order = $columns[$request->input('order.0.column')];
	 $dir = $request->input('order.0.dir');
	 
	 if(empty($request->input('search.value'))){
		 $posts = Contacts::offset($start)
				 ->limit($limit)
				 ->orderBy($order,$dir)
				 ->get();
		 $totalFiltered = Contacts::count();
	 }else{
		 $search = $request->input('search.value');
		 $posts = Contacts::where('created_at', 'like', "%{$search}%")
								 ->orWhere('name','like',"%{$search}%")
								 ->orWhere('email','like',"%{$search}%")
								 ->orWhere('cellphone','like',"%{$search}%")
								 ->orWhere('localphone','like',"%{$search}%")
								 ->orWhere('description','like',"%{$search}%")
								 ->offset($start)
								 ->limit($limit)
								 ->orderBy($order, $dir)
								 ->get();
		 $totalFiltered = Contacts::where('created_at', 'like', "%{$search}%")
								->orWhere('name','like',"%{$search}%")
								->orWhere('email','like',"%{$search}%")
								->orWhere('cellphone','like',"%{$search}%")
								->orWhere('localphone','like',"%{$search}%")
								->orWhere('description','like',"%{$search}%")
								 ->count();
								 
	 }		
				 
	 $data = array();
	 
	 if($posts){
		 foreach($posts as $r){
			 $nestedData['created_at']      = date("d-m-y H:i", strtotime($r->created_at));
			 $nestedData['name']            = $r->name;
			 $nestedData['email']           = $r->email;
			 $nestedData['cellphone']       = $r->cellphone;
			 $nestedData['localphone']		= $r->localphone;
			 $nestedData['description']    	= $r->description;
			
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

