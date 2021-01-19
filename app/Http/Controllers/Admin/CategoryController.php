<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\config_quoteandsell;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();
        $config_quoteandsell = config_quoteandsell::first();
        //dd($categories);
        return view('admin.category.index', compact('categories'),compact('config_quoteandsell'));
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
        return view('admin.category.create',compact('config_quoteandsell'));
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
        
       $category = Category::create([
           'name' => $request->get('name'),
           'slug' => str_slug($request->get('name')),
           'description' => $request->get('description'),
           'color' => $request->get('color')
        ]);
        
        $message = $category ? 'Clasificación agregada correctamente!' : 'La Clasificación NO pudo agregarse!';
        
        return redirect()->route('category.index')->with('message', $message);
                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, category $category)
    {
        //return ($request->input('name'));
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::find($id);
        $config_quoteandsell = config_quoteandsell::first();
        return view('admin.category.edit',compact('category','id'),compact('config_quoteandsell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
          'name' => 'required|max:255',
          'color' => 'required',
        ]);

        $category->fill($request->all());
        $category->slug = str_slug($request->get('name'));
        
        $updated = $category->save();
        
        $message = $updated ? 'Clasificación actualizada correctamente!' : 'La Clasificación NO pudo actualizarse!';
        
        $config_quoteandsell = config_quoteandsell::first();
        return redirect()->route('category.index',compact('config_quoteandsell'))->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $deleted = $category->delete();
        
        $message = $deleted ? 'Clasificación eliminada correctamente!' : 'La Clasificación NO pudo eliminarse!';
        
        $config_quoteandsell = config_quoteandsell::first();
        return redirect()->route('category.index',compact('config_quoteandsell'))->with('message', $message);
    }
}
