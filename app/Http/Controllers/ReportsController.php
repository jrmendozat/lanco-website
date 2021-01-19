<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ReportsController extends Controller
{

    public function accesswebsite()
    {
        return view('reports.accesswebsite');
    }

    public function contactUswebsite()
    {
        return view('reports.contactuswebsite');
    }

}    