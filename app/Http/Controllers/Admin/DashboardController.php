<?php

namespace App\Http\Controllers\admin;
use Jenssegers\Agent\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\config_quoteandsell;

class DashboardController extends Controller
{
   public function index()
    {
        $config_quoteandsell = config_quoteandsell::first();
        $agent = new Agent();
        if($agent->isMobile()) {
            return view('admin.mobile.dashboard.index',compact('config_quoteandsell'));
        } else {
            return view('admin.dashboard.index',compact('config_quoteandsell'));
            //return view('admin.mobile.dashboard.index',compact('config_quoteandsell'));
        }    
        
    }
}
