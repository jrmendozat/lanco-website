<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\config_quoteandsell;
use App\User;
use App\Product;
use App\order;
use App\PostOrderPay;


class DBusinessReportListController extends Controller
{
   public function index()
    {
        $config_quoteandsell = config_quoteandsell::first();
        return view('reports.index',compact('config_quoteandsell'));
    }


    // **Report List Users

    public function ReportListUser()
    {
        $config_quoteandsell = config_quoteandsell::first();
        return view('reports.datatable-user',compact('config_quoteandsell'));
    }

    public function getuser(Request $request){

		
		//print_r($request->all());
		$columns = array(
			0 => 'name', 
            1 => 'last_name', 
            2 => 'email', 
            3 => 'user',
            4 => 'user_type',
            5 => 'active',
            6 => 'address',
            7 => 'cell_phone',
            8 => 'local_phone',
            9 => 'rif_Invoice',
            10 => 'name_invoice',
            11 => 'adress_invoice',
            12 => 'create_by',
            13 => 'created_at'
					
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
                            ->orWhere('user','like',"%{$search}%")
                            ->orWhere('user_type','like',"%{$search}%")
                            ->orWhere('active','like',"%{$search}%")
                            ->orWhere('address','like',"%{$search}%")
                            ->orWhere('cell_phone','like',"%{$search}%")
                            ->orWhere('local_phone','like',"%{$search}%")
                            ->orWhere('rif_Invoice','like',"%{$search}%")
                            ->orWhere('name_invoice','like',"%{$search}%")
                            ->orWhere('adress_invoice','like',"%{$search}%")
                            ->orWhere('create_by','like',"%{$search}%")
                            ->orWhere('created_at','like',"%{$search}%")
							->offset($start)
							->limit($limit)
							->orderBy($order, $dir)
							->get();
			$totalFiltered = User::where('name', 'like', "%{$search}%")
                                    ->orWhere('last_name','like',"%{$search}%")
                                    ->orWhere('email','like',"%{$search}%")
                                    ->orWhere('user','like',"%{$search}%")
                                    ->orWhere('user_type','like',"%{$search}%")
                                    ->orWhere('active','like',"%{$search}%")
                                    ->orWhere('address','like',"%{$search}%")
                                    ->orWhere('cell_phone','like',"%{$search}%")
                                    ->orWhere('local_phone','like',"%{$search}%")
                                    ->orWhere('rif_Invoice','like',"%{$search}%")
                                    ->orWhere('name_invoice','like',"%{$search}%")
                                    ->orWhere('adress_invoice','like',"%{$search}%")
                                    ->orWhere('create_by','like',"%{$search}%")
                                    ->orWhere('created_at','like',"%{$search}%")
							        ->count();
		}		
					
		
		$data = array();
		
		if($posts){
			foreach($posts as $r){
			
				$nestedData['name']             = $r->name;
				$nestedData['last_name']        = $r->last_name;
                $nestedData['email']            = $r->email;
                $nestedData['user']             = $r->user;
                $nestedData['user_type']        = $r->user_type;
                $nestedData['active']           = $r->active;
                $nestedData['address']          = $r->address;
                $nestedData['cell_phone']       = $r->cell_phone;
                $nestedData['local_phone']      = $r->local_phone;
                $nestedData['rif_Invoice']      = $r->rif_Invoice;
                $nestedData['name_invoice']     = $r->name_invoice;
                $nestedData['adress_invoice']   = $r->adress_invoice;
                $nestedData['create_by']        = $r->create_by;
                $nestedData['created_at']       = $r->created_at;
                
				
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
    
    // **Report List Clients

    public function ReportListClients()
    {
        $config_quoteandsell = config_quoteandsell::first();
        return view('reports.datatable-clients',compact('config_quoteandsell'));
    }

    public function getclients(Request $request){

		
		//print_r($request->all());
		$columns = array(
			0 => 'name', 
            1 => 'last_name', 
            2 => 'email', 
            3 => 'user',
            4 => 'user_type',
            5 => 'active',
            6 => 'address',
            7 => 'cell_phone',
            8 => 'local_phone',
            9 => 'rif_Invoice',
            10 => 'name_invoice',
            11 => 'adress_invoice',
            12 => 'create_by',
            13 => 'created_at'
					
		);
		
        $totalData = User::where('user_type','user')->count();
        
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
            $posts = User::offset($start)
                    ->where('user_type','user')
					->limit($limit)
					->orderBy($order,$dir)
					->get();
			$totalFiltered = User::where('user_type','user')->count();
		}else{
			$search = $request->input('search.value');
            $posts = User::where('name', 'like', "%{$search}%")
                            ->orwhere('user_type','user')
							->orWhere('last_name','like',"%{$search}%")
                            ->orWhere('email','like',"%{$search}%")
                            ->orWhere('user','like',"%{$search}%")
                            ->orWhere('active','like',"%{$search}%")
                            ->orWhere('address','like',"%{$search}%")
                            ->orWhere('cell_phone','like',"%{$search}%")
                            ->orWhere('local_phone','like',"%{$search}%")
                            ->orWhere('rif_Invoice','like',"%{$search}%")
                            ->orWhere('name_invoice','like',"%{$search}%")
                            ->orWhere('adress_invoice','like',"%{$search}%")
                            ->orWhere('create_by','like',"%{$search}%")
                            ->orWhere('created_at','like',"%{$search}%")
                           	->offset($start)
							->limit($limit)
							->orderBy($order, $dir)
							->get();
            $totalFiltered = User::where('name', 'like', "%{$search}%")
                                    ->orwhere('user_type','user')
                                    ->orWhere('last_name','like',"%{$search}%")
                                    ->orWhere('email','like',"%{$search}%")
                                    ->orWhere('user','like',"%{$search}%")
                                    ->orWhere('active','like',"%{$search}%")
                                    ->orWhere('address','like',"%{$search}%")
                                    ->orWhere('cell_phone','like',"%{$search}%")
                                    ->orWhere('local_phone','like',"%{$search}%")
                                    ->orWhere('rif_Invoice','like',"%{$search}%")
                                    ->orWhere('name_invoice','like',"%{$search}%")
                                    ->orWhere('adress_invoice','like',"%{$search}%")
                                    ->orWhere('create_by','like',"%{$search}%")
                                    ->orWhere('created_at','like',"%{$search}%")
                                    ->count();
		}		
					
		
		$data = array();
		
		if($posts){
			foreach($posts as $r){
			
				$nestedData['name']             = $r->name;
				$nestedData['last_name']        = $r->last_name;
                $nestedData['email']            = $r->email;
                $nestedData['user']             = $r->user;
                $nestedData['user_type']        = $r->user_type;
                $nestedData['active']           = $r->active;
                $nestedData['address']          = $r->address;
                $nestedData['cell_phone']       = $r->cell_phone;
                $nestedData['local_phone']      = $r->local_phone;
                $nestedData['rif_Invoice']      = $r->rif_Invoice;
                $nestedData['name_invoice']     = $r->name_invoice;
                $nestedData['adress_invoice']   = $r->adress_invoice;
                $nestedData['create_by']        = $r->create_by;
                $nestedData['created_at']       = $r->created_at;
                
				
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
    

    // Report List Products

    public function ReportListProducts()
    {
        $config_quoteandsell = config_quoteandsell::first();
        return view('reports.datatable-products',compact('config_quoteandsell'));
    }

    public function getproducts(Request $request){

		
		//print_r($request->all());
		$columns = array(
			0 => 'name',
            1 => 'extract',
            2 => 'category_id',
            3 => 'sku',
            4 => 'partnumber',
            5 => 'unitPrice',
            6 => 'price',
            7 => 'product_presentation',
            8 => 'estimated_weight',
            9 => 'stock',
            10 => 'visible'
					
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
                            ->orWhere('extract','like',"%{$search}%")
                            ->orWhere('category_id','like',"%{$search}%")
                            ->orWhere('sku','like',"%{$search}%")
                            ->orWhere('partnumber','like',"%{$search}%")
                            ->orWhere('unitPrice','like',"%{$search}%")
                            ->orWhere('price','like',"%{$search}%")
                            ->orWhere('product_presentation','like',"%{$search}%")
                            ->orWhere('estimated_weight','like',"%{$search}%")
                            ->orWhere('stock','like',"%{$search}%")
                            ->orWhere('visible','like',"%{$search}%")
                            ->offset($start)
							->limit($limit)
							->orderBy($order, $dir)
							->get();
            $totalFiltered = Product::where('name', 'like', "%{$search}%")
                            ->orWhere('extract','like',"%{$search}%")
                            ->orWhere('category_id','like',"%{$search}%")
                            ->orWhere('sku','like',"%{$search}%")
                            ->orWhere('partnumber','like',"%{$search}%")
                            ->orWhere('unitPrice','like',"%{$search}%")
                            ->orWhere('price','like',"%{$search}%")
                            ->orWhere('product_presentation','like',"%{$search}%")
                            ->orWhere('estimated_weight','like',"%{$search}%")
                            ->orWhere('stock','like',"%{$search}%")
                            ->orWhere('visible','like',"%{$search}%")
                            ->count();
		}		
					
		
		$data = array();
		
		if($posts){
			foreach($posts as $r){
                
				$nestedData['name']                  = $r->name;
				$nestedData['extract']               = $r->extract;
                $nestedData['category_id']           = $r->category->name;
                $nestedData['sku']                   = $r->sku;
                $nestedData['partnumber']            = $r->partnumber;
                
                if($r->unitPrice == "1") {
                    $nestedData['unitPrice'] = "Kg";
                } Else {
                    $nestedData['unitPrice'] = "Unidad";	  
                }
                $nestedData['price']                = $r->price; 
                switch($r->product_presentation) {
                    Case "0":
                       $nestedData['product_presentation'] = "Unidad";
                    break;
                     Case "1":
                       $nestedData['product_presentation'] = "Paquete";
                    break;
                     Case 
                     $nestedData['product_presentation'] = "Detallado";
                    break;
                }
                $nestedData['estimated_weight']      = $r->estimated_weight;
                $nestedData['stock']                 = $r->stock;
                $nestedData['visible']               = $r->visible;
                
				$data[] = $nestedData;
			}
        }
      		
		$json_data = array(
			"draw"			  => intval($request->input('draw')),
			"recordsTotal"	  => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"			  => $data
		);
		
		echo json_encode($json_data);
    }
    
     // Report List Orders

     public function ReportListOrders()
     {
         $config_quoteandsell = config_quoteandsell::first();
         return view('reports.datatable-orders',compact('config_quoteandsell'));
     }
 
     public function getorders(Request $request){
 
         
         //print_r($request->all());
         $columns = array(
             0 => 'id', 
             1 => 'order_type',
             2 => 'user_id', 
             3 => 'user_name',
             4 => 'shipping', 
             5 => 'subtotal', 
             6 => 'create_date',
             7 => 'completed_date',
             8 => 'payment_date',
             9 => 'agree_refused_date',
             10 => 'shipment_date',
             11 => 'order_status',
             12 => 'order_status_name'
                  
         );
         
         $totalData = order::count();
         
         $limit = $request->input('length');
         $start = $request->input('start');
         $order = $columns[$request->input('order.0.column')];
         $dir = $request->input('order.0.dir');
         
         if(empty($request->input('search.value'))){
             $posts = order::offset($start)
                     ->limit($limit)
                     ->orderBy($order,$dir)
                     ->get();
             $totalFiltered = order::count();
         }else{
             $search = $request->input('search.value');
             $posts = order::where('id', 'like', "%{$search}%")
                             ->orWhere('user_id','like',"%{$search}%")
                             ->orWhere('subtotal','like',"%{$search}%")
                             ->orWhere('shipping','like',"%{$search}%")
                             ->orWhere('order_type','like',"%{$search}%")
                             ->orWhere('create_date','like',"%{$search}%")
                             ->orWhere('completed_date','like',"%{$search}%")
                             ->orWhere('payment_date','like',"%{$search}%")
                             ->orWhere('agree_refused_date','like',"%{$search}%")
                             ->orWhere('shipment_date','like',"%{$search}%")
                             ->orWhere('stock','like',"%{$search}%")
                             ->orWhere('order_status','like',"%{$search}%")
                             ->offset($start)
                             ->limit($limit)
                             ->orderBy($order, $dir)
                             ->get();
             $totalFiltered = order::where('id', 'like', "%{$search}%")
                                 ->orWhere('user_id','like',"%{$search}%")  
                                ->orWhere('subtotal','like',"%{$search}%")
                                ->orWhere('shipping','like',"%{$search}%")
                                ->orWhere('order_type','like',"%{$search}%")
                                ->orWhere('create_date','like',"%{$search}%")
                                ->orWhere('completed_date','like',"%{$search}%")
                                ->orWhere('payment_date','like',"%{$search}%")
                                ->orWhere('agree_refused_date','like',"%{$search}%")
                                ->orWhere('shipment_date','like',"%{$search}%")
                                ->orWhere('stock','like',"%{$search}%")
                                ->orWhere('order_status','like',"%{$search}%")
                                ->count();
         }		
                     
         
         $data = array();
         
         if($posts){
             foreach($posts as $r){
                $nestedData['id']                    = $r->id; 
                $nestedData['order_type']            = $r->order_type;
                $nestedData['user_id']               = $r->user_id;
                $nestedData['user_name']             = $r->User->name;
                $nestedData['shipping']              = $r->shipping;
                $nestedData['subtotal']              = $r->subtotal;
                $nestedData['create_date']           = $r->create_date;
                $nestedData['completed_date']        = $r->completed_date;
                $nestedData['payment_date']          = $r->payment_date;
                $nestedData['agree_refused_date']    = $r->agree_refused_date;
                $nestedData['shipment_date']         = $r->shipment_date;
                $nestedData['order_status']          = $r->order_status;
                switch($r->order_status) {
                    Case "1":
                       $nestedData['order_status_name'] = "Recibido";
                    break;
                    Case "2":
                       $nestedData['order_status_name'] = "Procesado";
                    break;
                    Case "5": 
                       $nestedData['order_status_name'] = "Cancelado";
                    break;  
                    Case "6": 
                       $nestedData['order_status_name'] = "Despachado";
                    break; 
                }
                $data[] = $nestedData;
             }
         }
         
        
         $json_data = array(
             "draw"			  => intval($request->input('draw')),
             "recordsTotal"	  => intval($totalData),
             "recordsFiltered" => intval($totalFiltered),
             "data"			  => $data
         );
         
         echo json_encode($json_data);
     }


    // **Report List OrderPay
    public function ReportListOrdersPay()
     {
         $config_quoteandsell = config_quoteandsell::first();
         return view('reports.datatable-orderpay',compact('config_quoteandsell'));
     }
 
     public function getorderpay(Request $request){
 
         
         $columns = array(
             0 => 'Paydate', 
             1 => 'Order_id',
             2 => 'user_id', 
             3 => 'user_name',
             4 => 'payType', 
             5 => 'amount',
             6 => 'NroBankTransfer', 
             7 => 'nameBank',
             8 => 'iduseredocument',
             9 => 'NroCredictCard',
             10 => 'expirydate',
             11 => 'NroValidation',
             12 => 'CardHolder',
             
              
         );
         

         $totalData = PostOrderPay::count();
         
         $limit = $request->input('length');
         $start = $request->input('start');
         $order = $columns[$request->input('order.0.column')];
         $dir = $request->input('order.0.dir');
         
         if(empty($request->input('search.value'))){
             $posts = PostOrderPay::offset($start)
                     ->limit($limit)
                     ->orderBy($order,$dir)
                     ->get();
             $totalFiltered = order::count();
         }else{
             $search = $request->input('search.value');
             $posts = PostOrderPay::where('Order_id', 'like', "%{$search}%")
                             ->orWhere('user_id','like',"%{$search}%")
                             ->orWhere('Paydate','like',"%{$search}%")
                             ->orWhere('payType','like',"%{$search}%")
                             ->orWhere('NroBankTransfer','like',"%{$search}%")
                             ->orWhere('nameBank','like',"%{$search}%")
                             ->orWhere('iduseredocument','like',"%{$search}%")
                             ->orWhere('NroCredictCard','like',"%{$search}%")
                             ->orWhere('expirydate','like',"%{$search}%")
                             ->orWhere('NroValidation','like',"%{$search}%")
                             ->orWhere('CardHolder','like',"%{$search}%")
                             ->orWhere('amount','like',"%{$search}%")
                             ->offset($start)
                             ->limit($limit)
                             ->orderBy($order, $dir)
                             ->get();
             $totalFiltered = PostOrderPay::where('Order_id', 'like', "%{$search}%")
                                            ->orWhere('user_id','like',"%{$search}%")
                                            ->orWhere('Paydate','like',"%{$search}%")
                                            ->orWhere('payType','like',"%{$search}%")
                                            ->orWhere('NroBankTransfer','like',"%{$search}%")
                                            ->orWhere('nameBank','like',"%{$search}%")
                                            ->orWhere('iduseredocument','like',"%{$search}%")
                                            ->orWhere('NroCredictCard','like',"%{$search}%")
                                            ->orWhere('expirydate','like',"%{$search}%")
                                            ->orWhere('NroValidation','like',"%{$search}%")
                                            ->orWhere('CardHolder','like',"%{$search}%")
                                            ->orWhere('amount','like',"%{$search}%")
                                            ->count();
         }		
                     
         
         $data = array();
         
         if($posts){
             foreach($posts as $r){
                $nestedData['Paydate']               = $r->Paydate; 
                $nestedData['Order_id']              = $r->Order_id;
                $nestedData['user_id']               = $r->user_id;
                $nestedData['user_name']             = $r->User->name;
                $nestedData['payType']               = $r->payType;
                $nestedData['amount']                = $r->amount;
                $nestedData['NroBankTransfer']       = $r->NroBankTransfer;
                $nestedData['nameBank']              = $r->nameBank;
                $nestedData['iduseredocument']       = $r->iduseredocument;
                $nestedData['NroCredictCard']        = $r->NroCredictCard;
                $nestedData['expirydate']            = $r->expirydate;
                $nestedData['NroValidation']         = $r->NroValidation;
                $nestedData['CardHolder']            = $r->CardHolder;
                
                $data[] = $nestedData;
             }
         }
         
         
        
         $json_data = array(
             "draw"			  => intval($request->input('draw')),
             "recordsTotal"	  => intval($totalData),
             "recordsFiltered" => intval($totalFiltered),
             "data"			  => $data
         );
         
         echo json_encode($json_data);
     }
}



    