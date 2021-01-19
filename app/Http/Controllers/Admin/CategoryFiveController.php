<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\categoryfive;
use App\config_quoteandsell;


class categoryfiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = categoryfive::all();
        $config_quoteandsell = config_quoteandsell::first();
        //dd($categories);
        return view('admin.categoryfive.index', compact('categories'),compact('config_quoteandsell'));
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
        return view('admin.categoryfive.create',compact('config_quoteandsell'));
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
        
       $categoryfive = categoryfive::create([
           'name' => $request->get('name'),
           'slug' => str_slug($request->get('name')),
           'description' => $request->get('description'),
           'color' => $request->get('color')
        ]);
        
        $message = $categoryfive ? 'Clasificación agregada correctamente!' : 'La Clasificación NO pudo agregarse!';
        
        return redirect()->route('categoryfive.index')->with('message', $message);
                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, categoryfive $categoryfive)
    {
        //return ($request->input('name'));
        return $categoryfive;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryfive = categoryfive::find($id);
        $id =  categorytwo::find($id);
        $config_quoteandsell = config_quoteandsell::first();
        return view('admin.categoryfive.edit',compact('categoryfive','id'),compact('config_quoteandsell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, categoryfive $categoryfive)
    {
        $this->validate($request, [
          'name' => 'required|max:255',
          'color' => 'required',
        ]);

        $categoryfive->fill($request->all());
        $categoryfive->slug = str_slug($request->get('name'));
        
        $updated = $categoryfive->save();
        
        $message = $updated ? 'Clasificación actualizada correctamente!' : 'La Clasificación NO pudo actualizarse!';
        
        $config_quoteandsell = config_quoteandsell::first();
        return redirect()->route('categoryfive.index',compact('config_quoteandsell'))->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoryfive $categoryfive)
    {
        $deleted = $categoryfive->delete();
        
        $message = $deleted ? 'Clasificación eliminada correctamente!' : 'La Clasificación NO pudo eliminarse!';
        
        $config_quoteandsell = config_quoteandsell::first();
        return redirect()->route('categoryfive.index',compact('config_quoteandsell'))->with('message', $message);
    }
}

