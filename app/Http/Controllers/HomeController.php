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
use App\config_quoteandsell;
use App\LoginRegister;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       $products = Product::all()->paginate(6);
       $config_quoteandsell = config_quoteandsell::first();
       $categories= Category::orderBy('id', 'desc')->pluck('name', 'id');
                 
       return view('home.desktop.index',compact('products'), compact('config_quoteandsell'));
    }
}
