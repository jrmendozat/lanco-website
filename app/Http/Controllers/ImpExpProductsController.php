<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportProducts;
use App\Exports\ExportLanco;
use App\Exports\ExportPriceList;
use App\Imports\ImportProducts;
use Maatwebsite\Excel\Facades\Excel;
use App\config_quoteandsell;
use App\Product;
use App\Category;
use App\Categorytwo;
use App\Categorythree;
use App\Categoryfour;
use App\Categoryfive;

  

class ImpExpProductsController extends Controller
{
    //
    /**
    * @return \Illuminate\Support\Collection
    */

    public function importExportView()
    {
       return view('admin.product.importproducts');
    }
  

    /**
    * @return \Illuminate\Support\Collection
    */

    public function export() 
    {
        set_time_limit(0);
        return Excel::download(new ExportProducts, 'productos.xlsx');
        set_time_limit(30);
    }


    public function exportlanco() 
    {
        set_time_limit(0);
        return Excel::download(new ExportLanco, 'productos.xlsx');
        set_time_limit(30);
    }

    /**
    * @return \Illuminate\Support\Collection
    */

    public function import() 

    {
        Excel::import(new ImportProducts,request()->file('file'));
        /* return back(); */
        $config_quoteandsell = config_quoteandsell::first();
        $products = Product::orderBy('name', 'desc')->paginate(5);
        return view('admin.product.index', compact('products'), compact('config_quoteandsell'));
    }

    public function ExportPriceList() 
    {
        set_time_limit(0);
        return Excel::download(new ExportPriceList, 'listadeprecios.xlsx');
        set_time_limit(30);
    }
}
