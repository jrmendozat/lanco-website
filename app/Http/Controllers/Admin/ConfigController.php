<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\config_quoteandsell;
use Jenssegers\Agent\Agent;

class ConfigController extends Controller
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
       
        return view('admin.config_quoteandsell.index', compact('config_quoteandsell'));
    }

    public function edit($id)
    {
        $config_quoteandsell = config_quoteandsell::first();
        return view('admin.config_quoteandsell.edit',compact('config_quoteandsell','$id'));
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
        
        $config_quoteandsell->fill($request->all());
        //dd($request->has('company_contact_1_enable'));
        
        $config_quoteandsell->enable_field_1 = $request->has('enable_field_1') ? 1 : 0;
        $config_quoteandsell->enable_field_2 = $request->has('enable_field_2') ? 1 : 0;
        $config_quoteandsell->enable_field_3 = $request->has('enable_field_3') ? 1 : 0;
        $config_quoteandsell->enable_field_4 = $request->has('enable_field_4') ? 1 : 0;
        $config_quoteandsell->enable_field_5 = $request->has('enable_field_5') ? 1 : 0;
        
        $config_quoteandsell->enable_category_1 = $request->has('enable_category_1') ? 1 : 0;
        $config_quoteandsell->enable_category_2 = $request->has('enable_category_2') ? 1 : 0;
        $config_quoteandsell->enable_category_3 = $request->has('enable_category_3') ? 1 : 0;
        $config_quoteandsell->enable_category_4 = $request->has('enable_category_4') ? 1 : 0;
        $config_quoteandsell->enable_category_5 = $request->has('enable_category_5') ? 1 : 0;

        $config_quoteandsell->company_contact_1_enable = $request->has('company_contact_1_enable') ? 1 : 0;
        $config_quoteandsell->company_contact_2_enable = $request->has('company_contact_2_enable') ? 1 : 0;
        $config_quoteandsell->company_contact_3_enable = $request->has('company_contact_3_enable') ? 1 : 0;
        $config_quoteandsell->company_contact_qs_1_enable = $request->has('company_contact_qs_1_enable') ? 1 : 0;
        $config_quoteandsell->company_contact_qs_2_enable = $request->has('company_contact_qs_2_enable') ? 1 : 0;
        $config_quoteandsell->company_contact_pay_1_enable = $request->has('company_contact_pay_1_enable') ? 1 : 0;
        $config_quoteandsell->company_contact_pay_2_enable = $request->has('company_contact_pay_2_enable') ? 1 : 0;
        $config_quoteandsell->company_contact_movaut_1_enable = $request->has('company_contact_movaut_1_enable') ? 1 : 0;
        $config_quoteandsell->company_contact_movaut_2_enable = $request->has('company_contact_movaut_2_enable') ? 1 : 0;
        $config_quoteandsell->company_contact_movcpt_1_enable = $request->has('company_contact_movcpt_1_enable') ? 1 : 0;
        $config_quoteandsell->company_contact_movcpt_2_enable = $request->has('company_contact_movcpt_2_enable') ? 1 : 0;
        $config_quoteandsell->company_contact_movshp_1_enable = $request->has('company_contact_movshp_1_enable') ? 1 : 0;
        $config_quoteandsell->company_contact_movshp_2_enable = $request->has('company_contact_movshp_2_enable') ? 1 : 0;
        
        $config_quoteandsell->Show_price_user_logout = $request->has('Show_price_user_logout') ? 1 : 0;
        $config_quoteandsell->Active_site = $request->has('Active_site') ? 1 : 0;
        $config_quoteandsell->Active_store = $request->has('Active_store') ? 1 : 0;
        $config_quoteandsell->DriveSell = $request->has('DriveSell') ? 1 : 0;
        $config_quoteandsell->DriveDealer = $request->has('DriveDealer') ? 1 : 0;
        
        switch ($config_quoteandsell->TypeStore) {
            case "autoparts":
                $config_quoteandsell->Icon_typestore = "fas fa-dolly-flatbed";
                $config_quoteandsell->product_typestore = "Repuestos";
                break;
            case "fashionshop":
                $config_quoteandsell->Icon_typestore = "fas fa-shopping-basket";
                $config_quoteandsell->product_typestore = "Prendas";
                break;
            case "foodstore":
                $config_quoteandsell->Icon_typestore = "fa fa-shopping-cart";
                $config_quoteandsell->product_typestore = "Articulos";
                break;
            default:
                $config_quoteandsell->Icon_typestore = "fa fa-shopping-cart";
                $config_quoteandsell->product_typestore = "Articulos";
        } 
     
        switch ($config_quoteandsell->modeFunction) {
            case "quote":
                $config_quoteandsell->Button_modeFunction   = "Cotizar";
                $config_quoteandsell->Label_modeFunction    = "Cotización";
                $config_quoteandsell->Title_modeFunction    = "Cotización"; 
                break;
            case "sell":
                $config_quoteandsell->Button_modeFunction   = "Comprar";
                $config_quoteandsell->Label_modeFunction    = "Compra";
                $config_quoteandsell->Title_modeFunction    = "Compra"; 
                break;
            case "quoteandsell":
                $config_quoteandsell->Button_modeFunction   = "Cargar";
                $config_quoteandsell->Label_modeFunction    = "Cotizar / Comprar";
                $config_quoteandsell->Title_modeFunction    = "Cotización / Compra"; 
                break;
            default:
                $config_quoteandsell->Button_modeFunction   = "Cargar";
                $config_quoteandsell->Label_modeFunction    = "Cotizar / Comprar";
                $config_quoteandsell->Title_modeFunction    = "Cotización / Compra"; 
               
        } 
        
        
        $updated = $config_quoteandsell->save();

        $message = $updated ? 'Configuracion General del Sistema actualizada correctamente!' : 'La Configuración NO pudo actualizarse!';
        
        $agent = new Agent();
        if($agent->isMobile()) {
            return redirect()->route('admin.mobile.dashboard.index')->with('message', $message);
        } else {
            return redirect()->route('config_quoteandsell.index')->with('message', $message);
        }    
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
