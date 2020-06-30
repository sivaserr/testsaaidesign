<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoices;
use App\Customers;
use PDF;
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
    	
    	return view('invoice_report.dayreport',$data);
    
    }
    public function monthlyreport(){
        $data['Invoices'] = [];
    	return view('invoice_report.monthlyreport',$data);
    
    }

    public function purchasedayreport(){

        $data['Purchases'] = [];
      
      return view('purchase_report.dayreport',$data);
    
    }
    public function purchasemonthlyreport(){
        $data['Purchases'] = [];
      return view('purchase_report.monthlyreport',$data);
    
    }

}
