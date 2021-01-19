<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\SaveProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Category;
use App\Categorytwo;
use App\Categorythree;
use App\Categoryfour;
use App\Categoryfive;
use App\config_quoteandsell;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name', 'desc')->paginate(5);
        //dd($products);
        $config_quoteandsell = config_quoteandsell::first();
        return view('admin.product.index', compact('products'), compact('config_quoteandsell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::orderBy('name', 'desc');
        $categories= Category::orderBy('id', 'desc')->pluck('name', 'id');
        $categoriestwo = Categorytwo::orderBy('id', 'desc')->pluck('name', 'id');
        $categoriesthree = Categorythree::orderBy('id', 'desc')->pluck('name', 'id');
        $categoriesfour = Categoryfour::orderBy('id', 'desc')->pluck('name', 'id');
        $categoriesfive = Categoryfive::orderBy('id', 'desc')->pluck('name', 'id');
        $config_quoteandsell = config_quoteandsell::first(); 
        //dd($categories);
        return view('admin.product.create', compact('categories','categoriestwo','categoriesthree','categoriesfour','categoriesfive','Products'),compact('config_quoteandsell'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProductRequest $request)
    {
                     
        If ($request->categoryone_id = 'null') {
           $request->categoryone_id = '1';
        }
        If ($request->categorytwo_id = 'null') {
           $request->categorytwo_id = '1';
        }
        If ($request->categorythree_id = 'null') {
           $request->categorythree_id = '1';
        }
        If ($request->categoryfour_id = 'null') {
           $request->categoryfour_id = '1';
        }
        If ($request->categoryfive_id = 'null') {
           $request->categoryfive_id = '1';
        }
             
        //dd($request->categorytwo_id);

         $data = [
            'name'                  => $request->get('name'),
            'sku'                   => $request->get('sku'),
            'upc'                   => $request->get('upc'),
            'partnumber'            => $request->get('partnumber'),
            'slug'                  => str_slug($request->get('name')),
            'description'           => $request->get('description'),
            'extract'               => $request->get('extract'),
            'price'                 => $request->get('price'),
            'tax'                   => $request->get('tax'),
            'stock'                 => $request->get('stock'),
            'unit'                  => $request->get('unit'),
            'image'                 => $request->get('image'),
            'visible'               => $request->has('visible') ? 1 : 0,
            'vip'                   => $request->has('vip') ? 1 : 0,
            'category_id'           => $request->categoryone_id,
            'categorytwo_id'        => $request->categorytwo_id,
            'categorythree_id'      => $request->categorythree_id,
            'categoryfour_id'       => $request->categoryfour_id,
            'categoryfive_id'       => $request->categoryfive_id,
            'field_1'               => $request->get('field_1'),
            'field_1'               => $request->get('field_2'),
            'field_3'               => $request->get('field_3'),
            'field_4'               => $request->get('field_4'),
            'field_5'               => $request->get('field_5')
                    
        ];

       
         
        $product = Product::create($data);

        $message = $product ? 'Producto agregado correctamente!' : 'El producto NO pudo agregarse!';
        
        return redirect()->route('product.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(Product $product)
    {
        //dd($id);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        
        
        $categories = Category::orderBy('id', 'desc')->pluck('name', 'id');
        //dd($categories);
        $categoriestwo = Categorytwo::orderBy('id', 'desc')->pluck('name', 'id');
        $categoriesthree = Categorythree::orderBy('id', 'desc')->pluck('name', 'id');
        $categoriesfour = Categoryfour::orderBy('id', 'desc')->pluck('name', 'id');
        $categoriesfive = Categoryfive::orderBy('id', 'desc')->pluck('name', 'id');
        $config_quoteandsell = config_quoteandsell::first();
        return view('admin.product.edit', compact('categories', 'categoriestwo','categoriesthree','categoriesfour','categoriesfive','product'),compact('config_quoteandsell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveProductRequest $request, Product $product)
    {
        //
        
        //dd($request);

        $product->fill($request->all());
        $product->slug = str_slug($request->get('name'));
        $product->visible = $request->has('visible') ? 1 : 0;
        $product->vip = $request->has('vip') ? 1 : 0;
        
        //dd($request->product_presentation);
                 
        switch ($request->product_presentation) {
            Case 0 :
              $product->product_presentation = '0';
              break;
            Case 1 :
              $product->product_presentation = '1';
              break;
            Case 2 :
              $product->product_presentation = '2';
              break;    
            Case 3 :
              $product->product_presentation = '3';
            break;
            Case 4 :
              $product->product_presentation = '4';
            break;
            Case 5 :
              $product->product_presentation = '5';
            break; 

        }

        switch ($request->unitPrice) {
            Case 0 :
              $product->unitPrice = '0';
              break;
            Case 1 :
              $product->unitPrice = '1';
              break;
        }      

        $updated = $product->save();
        
        $message = $updated ? 'Producto actualizado correctamente!' : 'El Producto NO pudo actualizarse!';
        
        $config_quoteandsell = config_quoteandsell::first();
        return redirect()->route('product.index',compact('config_quoteandsell'))->with('message', $message);
        
    }

    public function activeupdate($id)
    {
        //
        
        
        //dd($id);
        $product = Product::where('slug',$id)->first();  
                
        $Visible = $product->visible;
        if ($Visible == '1')  {
            $Visible = 0;
        } else {
            $Visible = 1;
        }
        $product->visible = $Visible;      
        $updated = $product->save();
       
        $config_quoteandsell = config_quoteandsell::first();
        return redirect()->route('product.index',compact('config_quoteandsell'));
       
    }

    public function deleteproduct($id)
    {
        //
        
        $product = Product::where('slug', str_slug($id))->first();  
        $deleted = $product->delete();
        
        $message = $deleted ? 'Producto eliminado correctamente!' : 'El Producto NO pudo eliminarse!';
        $config_quoteandsell = config_quoteandsell::first();
        return redirect()->route('product.index',compact('config_quoteandsell'))->with('message', $message);

       
    }


    public function confirmdeleteproduct($id)
    {
        //
        $config_quoteandsell = config_quoteandsell::first();
        return view('admin.product.delete-product',compact('id','config_quoteandsell'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy(Product $product)
    {
        $deleted = $product->delete();
        
        $message = $deleted ? 'Producto eliminado correctamente!' : 'El Producto NO pudo eliminarse!';
        $config_quoteandsell = config_quoteandsell::first();
        return redirect()->route('product.index',compact('config_quoteandsell'))->with('message', $message);
    }
}
