<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categorytwo;
use App\config_quoteandsell;


class CategorytwoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = categorytwo::all();
        $config_quoteandsell = config_quoteandsell::first();
        //dd($categories);
        return view('admin.categorytwo.index', compact('categories'),compact('config_quoteandsell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $config_quoteandsell = config_quoteandsell::first();
        return view('admin.categorytwo.create',compact('config_quoteandsell'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
        
       $this->validate($request, [
            'name' => 'required|unique:categories|max:255',
            'color' => 'required',
       ]);
        
       $categorytwo = categorytwo::create([
           'name' => $request->get('name'),
           'slug' => str_slug($request->get('name')),
           'description' => $request->get('description'),
           'color' => $request->get('color')
        ]);
        
        $message = $categorytwo ? 'Clasificación agregada correctamente!' : 'La Clasificación NO pudo agregarse!';
        
        return redirect()->route('categorytwo.index')->with('message', $message);
                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, categorytwo $categorytwo)
    {
        //return ($request->input('name'));
        return $categorytwo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $categorytwo = categorytwo::find($id);
        $id =  categorytwo::find($id);
        //dd($categorytwo->name);
        $config_quoteandsell = config_quoteandsell::first();
        return view('admin.categorytwo.edit',compact('categorytwo','id'),compact('config_quoteandsell'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, categorytwo $categorytwo)
    {
        $this->validate($request, [
          'name' => 'required|max:255',
          'color' => 'required',
        ]);

        $categorytwo->fill($request->all());
        $categorytwo->slug = str_slug($request->get('name'));
        
        $updated = $categorytwo->save();
        
        $message = $updated ? 'Clasificación actualizada correctamente!' : 'La Clasificación NO pudo actualizarse!';
        
        $config_quoteandsell = config_quoteandsell::first();
        return redirect()->route('categorytwo.index',compact('config_quoteandsell'))->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(categorytwo $categorytwo)
    {
        $deleted = $categorytwo->delete();
        
        $message = $deleted ? 'Clasificación eliminada correctamente!' : 'La Clasificación NO pudo eliminarse!';
        
        $config_quoteandsell = config_quoteandsell::first();
        return redirect()->route('categorytwo.index',compact('config_quoteandsell'))->with('message', $message);
    }
}
