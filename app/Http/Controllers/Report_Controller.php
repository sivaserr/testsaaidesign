<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Report_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dayreport(){

        $data['Invoices'] = [];
    	
    	return view('report.dayreport',$data);
    
    }
    public function monthlyreport(){
        $data['Invoices'] = [];
    	return view('report.monthlyreport',$data);
    
    }

}
