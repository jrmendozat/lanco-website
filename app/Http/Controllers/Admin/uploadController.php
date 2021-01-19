<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\config_quoteandsell;

class uploadController extends Controller
{
    //
    public function index ()
    {
        $config_quoteandsell = config_quoteandsell::first(); 
        return view('admin.upload.upload', compact('config_quoteandsell'));
    }

    public function store(Request $request)
    {
        //
       return $request->file('image');
    }
}
