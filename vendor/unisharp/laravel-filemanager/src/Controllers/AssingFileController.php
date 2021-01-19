<?php

namespace UniSharp\LaravelFilemanager\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Product;

class AssingFileController extends Controller
{
    public function assingfile()
    {

        $name_to_assing = request('items');
        $id_product = "";

        //dd($name_to_assing);
        return view('laravel-filemanager::assingfile')->with('name_to_assing', $name_to_assing)
                                                      ->with('id_product', $id_product);
    }
    
    public function performAssingfile()
    {
       //$name_to_assing = request('name_to_assing'); 
       $name_to_assing = request('items');
       dd($name_to_assing);
       $products = Product::orderBy('name', 'desc')->paginate(5);
     
       
    }
}
    
