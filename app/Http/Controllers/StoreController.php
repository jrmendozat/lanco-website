<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Category;
use App\Categorytwo;
use App\Categorythree;
use App\Categoryfour;
use App\Categoryfive;
use App\config_quoteandsell;
use App\LoginRegister;
use PDF;


class StoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 

    public function index()
    {
      
      
    }

    
    
     public function show($slug,$id,$id2)
    {
        
        $product = Product::where('slug', $slug)->first();
        $config_quoteandsell = config_quoteandsell::first();
        $categories= Category::orderBy('id', 'desc')->pluck('name', 'id');
       
        //dd($product);
        $categoryselect = $id;
        $categorytwoselect = $id2;

        $agent = new Agent();
        if($agent->isMobile()) {
            return view('home.mobile.show', compact('product','categoryselect','categorytwoselect'), compact('config_quoteandsell'));
        } else {
            return view('home.desktop.show', compact('product','categoryselect','categorytwoselect'), compact('config_quoteandsell'));   
        }    
    }

   


    public function gostore($id,$id2)
    {
       
        if(Auth::check()) {
            $userid = Auth::user()->id;
            $LoginRegister = LoginRegister::where('user_id', $userid)->max('id');
            $loginid = $LoginRegister;
            //$loginid = json_encode($LoginRegister);
            if ($LoginRegister == Null) {
                $ip = \Request::ip();
                $userid = Auth::user()->id;
                $LoginRegister= LoginRegister::create([
                    'user_id' 					=> Auth::user()->id,
                    'ip_access' 				=> $ip ,
                    'country_access' 			=> '',
                    'view_type_products' 		=> 'Pinterest-sm',
                    'view_type_scream' 			=> 'Full',
                    'TypeDemo' 					=> '0',
                    'ModoDemo'                  => '0',
                    'Category_id' 				=> '0',
                ]);
                $loginRegister = LoginRegister::where('user_id', $userid)->max('id');
            }
            $LoginRegister = LoginRegister::find($LoginRegister);
            $LoginRegister->Category_id = $id;
            $updated = $LoginRegister->save();
            $LoginRegister = LoginRegister::find($loginid);
            $view_type_products = $LoginRegister->view_type_products;
		    $view_type_scream = $LoginRegister->view_type_scream;
		    $categoryselect = $LoginRegister->Category_id;
            $config_quoteandsell = config_quoteandsell::first();
        }else {
            $config_quoteandsell = config_quoteandsell::first();
            $config_quoteandsell->Category_id = $id;
            $updated = $config_quoteandsell->save();
            $config_quoteandsell = config_quoteandsell::first();
            $view_type_products = $config_quoteandsell->view_type_products;
		    $view_type_scream = $config_quoteandsell->view_type_scream ;
            $categoryselect = $config_quoteandsell->Category_id;
        }
   

        $agent = new Agent();
        if($agent->isMobile()) {
            if ( $id2 == 0) {
                $products  = DB::table('products')->where('category_id', $id)->paginate(4);
            }else {
                $products  = DB::table('products')->where('category_id', $id)
                                                ->where('categorytwo_id', $id2)
                                                ->paginate(4);
            }
        } else {
            if ( $id2 == 0) {
                $products  = DB::table('products')->where('category_id', $id)->paginate(9);
            }else {
                $products  = DB::table('products')->where('category_id', $id)
                                                ->where('categorytwo_id', $id2)
                                                ->paginate(9);
            }
        }    

        $categoryselect = $id;
        $categorytwoselect = $id2;
        
        $categories= Category::all();
        
        if ($config_quoteandsell->Active_site) {
            $agent = new Agent();
            if($agent->isMobile()) {
               return view('home.mobile.show-products', compact('products','categories','view_type_products','view_type_scream','categoryselect','categorytwoselect'), compact('config_quoteandsell'));
            } else {
               return view('home.desktop.show-products', compact('products','categories','view_type_products','view_type_scream','categoryselect','categorytwoselect'), compact('config_quoteandsell')); 
            }   
         }else {
            return view('Store.siteoffline'); 
         }
    }

 
    public function gocorporation() {

        $config_quoteandsell = config_quoteandsell::first();
        if ($config_quoteandsell->Active_site) {
            $agent = new Agent();
            if($agent->isMobile()) {
               return view('home.mobile.corporation',  compact('config_quoteandsell'));
            } else {
               return view('home.desktop.corporation',  compact('config_quoteandsell')); 
            }   
         }else {
            return view('Store.siteoffline'); 
         }
    }
    

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function downloadfile($file)
    {
        
        //dd(public_path());
        $path = public_path().'/image/docs/'.$file;
        return response()->download($path);
    }


}


