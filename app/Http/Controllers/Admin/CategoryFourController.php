<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\categoryfour;
use App\config_quoteandsell;


class categoryfourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = categoryfour::all();
        $config_quoteandsell = config_quoteandsell::first();
        //dd($categories);
        return view('admin.categoryfour.index', compact('categories'),compact('config_quoteandsell'));
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
        return view('admin.categoryfour.create',compact('config_quoteandsell'));
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
        
       $categoryfour = categoryfour::create([
           'name' => $request->get('name'),
           'slug' => str_slug($request->get('name')),
           'description' => $request->get('description'),
           'color' => $request->get('color')
        ]);
        
        $message = $categoryfour ? 'Clasificación agregada correctamente!' : 'La Clasificación NO pudo agregarse!';
        
        return redirect()->route('categoryfour.index')->with('message', $message);
                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, categoryfour $categoryfour)
    {
        //return ($request->input('name'));
        return $categoryfour;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryfour = categoryfour::find($id);
        $id =  categorytwo::find($id);
        $config_quoteandsell = config_quoteandsell::first();
        return view('admin.categoryfour.edit',compact('categoryfour','id'),compact('config_quoteandsell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, categoryfour $categoryfour)
    {
        $this->validate($request, [
          'name' => 'required|max:255',
          'color' => 'required',
        ]);

        $categoryfour->fill($request->all());
        $categoryfour->slug = str_slug($request->get('name'));
        
        $updated = $categoryfour->save();
        
        $message = $updated ? 'Clasificación actualizada correctamente!' : 'La Clasificación NO pudo actualizarse!';
        
        $config_quoteandsell = config_quoteandsell::first();
        return redirect()->route('categoryfour.index',compact('config_quoteandsell'))->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoryfour $categoryfour)
    {
        $deleted = $categoryfour->delete();
        
        $message = $deleted ? 'Clasificación eliminada correctamente!' : 'La Clasificación NO pudo eliminarse!';
        
        $config_quoteandsell = config_quoteandsell::first();
        return redirect()->route('categoryfour.index',compact('config_quoteandsell'))->with('message', $message);
    }
}
