<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\config_quoteandsell;

class ConfigViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $config_quoteandsell = config_quoteandsell::first();
        
       //dd($config_quoteandsell);
       
        return view('admin.config_view_quoteandsell.index', compact('config_quoteandsell'));
    }

    public function edit($id)
    {
        $config_quoteandsell = config_quoteandsell::first();
      
        return view('admin.config_view_quoteandsell.edit',compact('config_quoteandsell','$id'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function update(Request $request, config_quoteandsell $config_quoteandsell)
    {
        //
        
        //$config_quoteandsell->fill($request->all());
        //dd($request->Information_footer);

        $config_quoteandsell = config_quoteandsell::first();
        $config_quoteandsell->Information_footer = $request->Information_footer;
        $config_quoteandsell->Tutorial_site  = $request->Tutorial_site ;


        $config_quoteandsell->Image_slider_1 = $request->Image_slider_1;
        $config_quoteandsell->text_1_slide_1 = $request->text_1_slide_1;
        $config_quoteandsell->text_2_slide_1 = $request->text_2_slide_1;
        $config_quoteandsell->text_3_slide_1 = $request->text_3_slide_1;
        $config_quoteandsell->Image_slider_2 = $request->Image_slider_2;
        $config_quoteandsell->text_1_slide_2 = $request->text_1_slide_2;
        $config_quoteandsell->text_2_slide_2 = $request->text_2_slide_2;
        $config_quoteandsell->text_3_slide_2 = $request->text_3_slide_2;
        $config_quoteandsell->Image_slider_3 = $request->Image_slider_3;
        $config_quoteandsell->text_1_slide_3 = $request->text_1_slide_3;
        $config_quoteandsell->text_2_slide_3 = $request->text_2_slide_3;
        $config_quoteandsell->text_3_slide_3 = $request->text_3_slide_3;
        $config_quoteandsell->Image_slider_4 = $request->Image_slider_4;
        $config_quoteandsell->text_1_slide_4 = $request->text_1_slide_4;
        $config_quoteandsell->text_2_slide_4 = $request->text_2_slide_4;
        $config_quoteandsell->text_3_slide_4 = $request->text_3_slide_4;
        $config_quoteandsell->Image_slider_5 = $request->Image_slider_5;
        $config_quoteandsell->text_1_slide_5 = $request->text_1_slide_5;
        $config_quoteandsell->text_2_slide_5 = $request->text_2_slide_5;
        $config_quoteandsell->text_3_slide_5 = $request->text_3_slide_5;



        $config_quoteandsell->store_box1_title   = $request->store_box1_title;
        $config_quoteandsell->store_box1_image   = $request->store_box1_image;
        $config_quoteandsell->store_box1_Body    = $request->store_box1_Body;
        $config_quoteandsell->store_box1_footer  = $request->store_box1_footer;

        $config_quoteandsell->store_box2_title   = $request->store_box2_title;
        $config_quoteandsell->store_box2_image   = $request->store_box2_image;
        $config_quoteandsell->store_box2_Body    = $request->store_box2_Body;
        $config_quoteandsell->store_box2_footer  = $request->store_box2_footer;

        $config_quoteandsell->store_box3_title   = $request->store_box3_title;
        $config_quoteandsell->store_box3_image   = $request->store_box3_image;
        $config_quoteandsell->store_box3_Body    = $request->store_box3_Body;
        $config_quoteandsell->store_box3_footer  = $request->store_box3_footer;

        $config_quoteandsell->store_box4_title   = $request->store_box4_title;
        $config_quoteandsell->store_box4_image   = $request->store_box4_image;
        $config_quoteandsell->store_box4_Body    = $request->store_box4_Body;
        $config_quoteandsell->store_box4_footer  = $request->store_box4_footer;

        $config_quoteandsell->store_box5_title   = $request->store_box5_title;
        $config_quoteandsell->store_box5_image   = $request->store_box5_image;
        $config_quoteandsell->store_box5_Body    = $request->store_box5_Body;
        $config_quoteandsell->store_box5_footer  = $request->store_box5_footer;

        $config_quoteandsell->store_box1_active  = $request->has('store_box1_active') ? 1 : 0;
        $config_quoteandsell->store_box2_active  = $request->has('store_box2_active') ? 1 : 0;
        $config_quoteandsell->store_box3_active  = $request->has('store_box3_active') ? 1 : 0;
        $config_quoteandsell->store_box4_active  = $request->has('store_box4_active') ? 1 : 0;
        $config_quoteandsell->store_box5_active  = $request->has('store_box5_active') ? 1 : 0;
                        
        $updated = $config_quoteandsell->save();

        $message = $updated ? 'Configuracion General del Sistema actualizada correctamente!' : 'La Configuración NO pudo actualizarse!';
        
        return redirect()->route('config_view_quoteandsell.index')->with('message', $message);
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
}
