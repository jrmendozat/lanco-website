<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Categorytwo;
use App\Categorythree;
use App\Categoryfour;
use App\Categoryfive;
use App\config_quoteandsell;


use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    //
   public function productsloadimport(){
      $config_quoteandsell = config_quoteandsell::first();
      return view('admin.product.importproducts', compact('config_quoteandsell')); 
    }

    Public function productsimport(Request $request){
      
       if($request->hasFile('file')){  
          $fileimportdata = $request->file('file');
          $path = $request->file('file')->getRealPath(); 
          //dd($path);
          $data = Excel::load($path, function($reader){})->get();
          dd($data);
          if($data->count() && !empty($data)){
            foreach ($data as $key) {
                 $product = new product();
                 $product->name                     = $key->name;
                 $product->slug                     = "S_".$key->name;
                 $product->description              = $key->description;
                 $product->extract                  = $key->extract;
                 $product->image                    = "/image/store/shopingcar/".$key->image.".jpg";
                 $product->image_2                  = "/image/store/shopingcar/".$key->image_2.".jpg";
                 $product->image_3                  = "/image/store/shopingcar/".$key->image_3.".jpg";
                 $product->image_4                  = "/image/store/shopingcar/".$key->image_4.".jpg";
                 $product->image_5                  = "/image/store/shopingcar/".$key->image_5.".jpg";
                 $product->data_sheet_1             = $key->data_sheet_1;
                 $product->data_sheet_2             = "";
                 $product->data_sheet_3             = "";
                 $product->visible                  = $key->visible;
                 $product->stock                    = 1;
                 $product->price                    = $key->price;
                 $product->unitPrice                = $key->unitPrice;
                 $product->product_presentation     = $key->product_presentation;
                 $product->estimated_weight         = 1;
                 $product->category_id 	            = $key->category_id;
				 $product->categorytwo_id 	        = $key->categorytwo_id;
				 $product->categorythree_id = 1;
				 $product->categoryfour_id 	= 1;
                 $product->categoryfive_id  = 1;
                 
                 $product->save();
            }  
           
               $message = 'Importacion de Archivo Exitosa';
               return redirect()->route('product.index')->with('message', $message);  
            }  
          }else {
            $message = 'Archivo no pudo ser importado';
            return redirect()->route('product.index')->with('message', $message);
        }
       
    }

    public function productsexport()
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        Excel::create('Q&SProductos', function($excel) {
            $excel->sheet('Hoja1', function($sheet) {
                
                $products = Product::all();                
                $sheet->fromArray($products);
                $sheet->setOrientation('landscape');
            });
        })->export('xls');
    }
   
    public function productsdelete(){
        $config_quoteandsell = config_quoteandsell::first();
        /*$deleteall = Product::truncate();*/
        $deleteall = Product::whereNotNull('id')->delete();
        $message = $deleteall ? 'Tabla Productos eliminada correctamente!' : 'Tabla Productos NO pudo eliminarse!';
        return redirect()->route('product.index')->with('message', $message);
    }
   

}
