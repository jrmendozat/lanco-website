<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DataAdminUserController extends Controller
{
    //
	
	public function getusers(Request $request){

		
		//print_r($request->all());
		$columns = array(
			0 	=> 'id',
			1 	=> 'name',
		    2 	=> 'last_name',
            3 	=> 'email',
            4   => 'cell_phone',
            5   => 'user_type',
			6 	=> 'seller_assigned',
			7 	=> 'active',
			8 	=> 'vip',
			9 	=> 'action',
			10 	=> 'action2',
      		11 	=> 'action3',
      	   
		);
		
		$totalData = User::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$posts = User::offset($start)
					->limit($limit)
					->orderBy($order,$dir)
					->get();
			$totalFiltered = User::count();
		}else{
			$search = $request->input('search.value');
			$posts = User::where('name', 'like', "%{$search}%")
							->orWhere('last_name','like',"%{$search}%")
							->orWhere('email','like',"%{$search}%")
							->orWhere('user_type','like',"%{$search}%")
							->orWhere('cell_phone','like',"%{$search}%")
							->orWhere('seller_assigned','like',"%{$search}%")
                           	->offset($start)
							->limit($limit)
							->orderBy($order, $dir)
							->get();
			$totalFiltered = User::where('name', 'like', "%{$search}%")
                            ->orWhere('last_name','like',"%{$search}%")
							->orWhere('email','like',"%{$search}%")
							->orWhere('user_type','like',"%{$search}%")
                            ->orWhere('cell_phone','like',"%{$search}%")
                            ->orWhere('seller_assigned','like',"%{$search}%")
							->count();
		}		
					
		
		$data = array();
		
		if($posts){
			foreach($posts as $r){
                if($r->user_type != 'createmode' & $r->last_name != 'AuthCheck') {
					$nestedData['id']               = $r->id;
					$nestedData['name']             = $r->name;
					$nestedData['last_name']        = $r->last_name;
					$nestedData['email']            = $r->email;
					$nestedData['cell_phone']       = $r->cell_phone;
					$nestedData['user_type']        = $r->user_type;
					$nestedData['active']           = $r->active;
					$nestedData['seller_assigned']  = $r->seller_assigned;
					$nestedData['vip']              = $r->vip;
					$nestedData['action']  		= '';
					$nestedData['action2']		= '';
					$nestedData['action3']		= '';
					$data[] = $nestedData;
				}
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
