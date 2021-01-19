<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\config_quoteandsell;
use App\User;
use App\Product;
use App\order;
use App\orderitem;
use App\PostOrderPay;


class DBusinessReportResultController extends Controller
{
   public function index()
    {
        $config_quoteandsell = config_quoteandsell::first();
        return view('reports.index',compact('config_quoteandsell'));
    }


     // **Report Sell By Products
     public function ReportResultSellByProduct()
     {
         $config_quoteandsell = config_quoteandsell::first();
         return view('reports.datatable-sellbyproduct',compact('config_quoteandsell'));
     }
 
      
     public function getsellbyproduct(Request $request){
 
         
        
         $columns = array(
             0 => 'product_id',
             1 => 'name',
             2 => 'total_sell',
             3 => 'quantity'
                           
         );
         
         
         $totalData = orderitem::count();
         
         $limit = $request->input('length');
         $start = $request->input('start');
         $order = $columns[$request->input('order.0.column')];
         $group = $columns[$request->input('order.0.column')];
         $dir = $request->input('order.0.dir');
         
         if(empty($request->input('search.value'))){
             
            $posts = DB::table('order_items')
                    ->join('orders', 'order_items.order_id', '=', 'orders.id')
                    ->select(DB::raw('product_id, name, sum(price * quantity) as total_sell, sum(quantity) as total_quantity '))
                    ->orderByRaw('total_sell DESC')
                    ->groupBy('product_id')
                    ->offset($start)
                    ->limit($limit)
                    ->get();

            $totalFiltered = DB::table('order_items')
                    ->groupBy('product_id')
                    ->count();      

            $totalFiltered = $totalFiltered + 1;

                                                 
             
         }else{
             $search = $request->input('search.value');
             $posts = orderitem::where('product_id', 'like', "%{$search}%")
                             ->offset($start)
                             ->limit($limit)
                             ->groupBy($group)
                             ->orderBy($order, $dir)
                             ->get();
             $totalFiltered = orderitem::where('product_id', 'like', "%{$search}%")
                                ->groupBy($group)
                                ->count();
         }		
                     
         
         $data = array();
         
         if($posts){
             foreach($posts as $r){
                $nestedData['product_id']   = $r->product_id; 
                $nestedData['name']         = $r->name; 
                $nestedData['total_sell']   = $r->total_sell; 
                $nestedData['quantity']     = $r->total_quantity; 
               
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
    
    // **Report Sell By Clients

    public function ReportResultSellByClient()
     {
         $config_quoteandsell = config_quoteandsell::first();
         return view('reports.datatable-sellbyclients',compact('config_quoteandsell'));
     }



     public function getsellbyclient(Request $request){
 
         
        
        $columns = array(
            0 => 'client_id',
            1 => 'name',
            2 => 'total_sell'
            
                          
        );
        
        
        $totalData = User::count();
        
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $group = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        
        if(empty($request->input('search.value'))){
            
           $posts = DB::table('order_items')
                   ->join('orders', 'order_items.order_id', '=', 'orders.id')
                   ->join('users', 'orders.user_id', '=', 'users.id')
                   ->select(DB::raw('orders.user_id as client_id, users.name as name, sum(price * quantity) as total_sell, sum(quantity) as total_quantity '))
                   ->orderByRaw('total_sell DESC')
                   ->groupBy('user_id')
                   ->offset($start)
                   ->limit($limit)
                   ->get();

           $totalFiltered = DB::table('orders')
                   ->groupBy('user_id')
                   ->count();      

           $totalFiltered = $totalFiltered + 1;

                                                
            
        }else{
            $search = $request->input('search.value');
            $posts = orderitem::where('product_id', 'like', "%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->groupBy($group)
                            ->orderBy($order, $dir)
                            ->get();
            $totalFiltered = orderitem::where('product_id', 'like', "%{$search}%")
                               ->groupBy($group)
                               ->count();
        }		
                    
        
        $data = array();
        
        if($posts){
            foreach($posts as $r){
               $nestedData['client_id']    = $r->client_id; 
               $nestedData['name']         = $r->name; 
               $nestedData['total_sell']   = $r->total_sell; 
              
              
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
         
   //Inetigent 


   public function Reportproductselectnotbought()
   {
     $config_quoteandsell = config_quoteandsell::first();
    return view('reports.datatable-productSelectNotBought',compact('config_quoteandsell'));
   }

   public function getproductselectnotbought(Request $request){
 
         
        
    $columns = array(
        0 => 'product_id',
        1 => 'name',
        2 => 'total_sell',
        3 => 'quantity'
                      
    );
    
    
    $totalData = orderitem::count();
    
    $limit = $request->input('length');
    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $group = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');
    
    if(empty($request->input('search.value'))){
        
       $posts = DB::table('order_items')
               ->join('orders', 'order_items.order_id', '=', 'orders.id')
               ->select(DB::raw('product_id, name, sum(price * quantity) as total_sell, sum(quantity) as total_quantity '))
               ->orderByRaw('total_sell DESC')
               ->groupBy('product_id')
               ->offset($start)
               ->limit($limit)
               ->get();

       $totalFiltered = DB::table('order_items')
               ->groupBy('product_id')
               ->count();      

       $totalFiltered = $totalFiltered + 1;

                                            
        
    }else{
        $search = $request->input('search.value');
        $posts = orderitem::where('product_id', 'like', "%{$search}%")
                        ->offset($start)
                        ->limit($limit)
                        ->groupBy($group)
                        ->orderBy($order, $dir)
                        ->get();
        $totalFiltered = orderitem::where('product_id', 'like', "%{$search}%")
                           ->groupBy($group)
                           ->count();
    }		
                
    
    $data = array();
    
    if($posts){
        foreach($posts as $r){
           $nestedData['product_id']   = $r->product_id; 
           $nestedData['name']         = $r->name; 
           $nestedData['total_sell']   = $r->total_sell; 
           $nestedData['quantity']     = $r->total_quantity; 
          
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

public function Reportclientsselectnotbought()
{
   $config_quoteandsell = config_quoteandsell::first();
   return view('reports.datatable-clientsSelectNotbought',compact('config_quoteandsell'));
}


public function getclientsselectnotbought(Request $request){
 
         
        
    $columns = array(
        0 => 'client_id',
        1 => 'name',
        2 => 'total_sell'
        
                      
    );
    
    
    $totalData = User::count();
    
    $limit = $request->input('length');
    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $group = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');
    
    if(empty($request->input('search.value'))){
        
       $posts = DB::table('order_items')
               ->join('orders', 'order_items.order_id', '=', 'orders.id')
               ->join('users', 'orders.user_id', '=', 'users.id')
               ->select(DB::raw('orders.user_id as client_id, users.name as name, sum(price * quantity) as total_sell, sum(quantity) as total_quantity '))
               ->orderByRaw('total_sell DESC')
               ->groupBy('user_id')
               ->offset($start)
               ->limit($limit)
               ->get();

       $totalFiltered = DB::table('orders')
               ->groupBy('user_id')
               ->count();      

       $totalFiltered = $totalFiltered + 1;

                                            
        
    }else{
        $search = $request->input('search.value');
        $posts = orderitem::where('product_id', 'like', "%{$search}%")
                        ->offset($start)
                        ->limit($limit)
                        ->groupBy($group)
                        ->orderBy($order, $dir)
                        ->get();
        $totalFiltered = orderitem::where('product_id', 'like', "%{$search}%")
                           ->groupBy($group)
                           ->count();
    }		
                
    
    $data = array();
    
    if($posts){
        foreach($posts as $r){
           $nestedData['client_id']    = $r->client_id; 
           $nestedData['name']         = $r->name; 
           $nestedData['total_sell']   = $r->total_sell; 
          
          
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

public function ReportCarNotComplete()
{
   $config_quoteandsell = config_quoteandsell::first();
   return view('reports.datatable-carNotComplete',compact('config_quoteandsell'));
}


public function getCarNotComplete(Request $request){
 
         
        
    $columns = array(
        0 => 'product_id',
        1 => 'name',
        2 => 'total_sell',
        3 => 'quantity'
                      
    );
    
    
    $totalData = orderitem::count();
    
    $limit = $request->input('length');
    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $group = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');
    
    if(empty($request->input('search.value'))){
        
       $posts = DB::table('order_items')
               ->join('orders', 'order_items.order_id', '=', 'orders.id')
               ->select(DB::raw('product_id, name, sum(price * quantity) as total_sell, sum(quantity) as total_quantity '))
               ->orderByRaw('total_sell DESC')
               ->groupBy('product_id')
               ->offset($start)
               ->limit($limit)
               ->get();

       $totalFiltered = DB::table('order_items')
               ->groupBy('product_id')
               ->count();      

       $totalFiltered = $totalFiltered + 1;

                                            
        
    }else{
        $search = $request->input('search.value');
        $posts = orderitem::where('product_id', 'like', "%{$search}%")
                        ->offset($start)
                        ->limit($limit)
                        ->groupBy($group)
                        ->orderBy($order, $dir)
                        ->get();
        $totalFiltered = orderitem::where('product_id', 'like', "%{$search}%")
                           ->groupBy($group)
                           ->count();
    }		
                
    
    $data = array();
    
    if($posts){
        foreach($posts as $r){
           $nestedData['product_id']   = $r->product_id; 
           $nestedData['name']         = $r->name; 
           $nestedData['total_sell']   = $r->total_sell; 
           $nestedData['quantity']     = $r->total_quantity; 
          
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