<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materials;
use App\Invoices;
use App\Invoice_products;
use DB;
class Invoice_Controller extends Controller
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
    
    public function index()
    {
        return view('invoices.invoice_entry');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = new Invoices();

        $invoice->invoice_no = $request->input('invoiceno');
        $invoice->customer_id = $request->input('customer');
        $invoice->date = $request->input('date');
        $invoice->sub_total = $request->input('sub_total');
        $invoice->tax = $request->input('tax');
        $invoice->tax_amount = $request->input('tax_amount');
        $invoice->total_amount = $request->input('total_amount');


        $invoiceproducts = $request->input('invoiceproduct_datas');    

        if($invoice->save()){

            foreach ($invoiceproducts as $invoiceproduct) {
        $invoice_products = new Invoice_products();
        $invoice_products->invoice_id =$invoice->id ;
        $invoice_products->description = $invoiceproduct['description'];
        $invoice_products->material_id = $invoiceproduct['material'];
        $invoice_products->sqrft_copies = $invoiceproduct['sqrft_copies'];
        $invoice_products->total_sqrft_copies = $invoiceproduct['total'];
        $invoice_products->qty = $invoiceproduct['qty'];
        $invoice_products->price = $invoiceproduct['price'];
        $invoice_products->netvalue = $invoiceproduct['netvalue'];
        $invoice_products->save();
             }

                echo json_encode(['status'=>'success','message'=>'Bill Saved Successfully.']);
            }else{
                echo json_encode(['status'=>'failed','message'=>'Something went wrong Try Later!.']);
            }
    

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
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

    public function allmaterial(){

        $materials = Materials::all();

        return view('invoices.invoice_entry')->with('materials',$materials);

    }
   public function filterdata(Request $request){

        $Invoices = Invoices::where([ ['date','=',$request->date]  ])->get();

        $data['Invoices'] = $Invoices;
       return view('report.dayreport',$data);
   }

    public function filtermonthly(Request $request){
        $from_date = $request->fromdate;
        $to_date = $request->todate;

        $Invoices = Invoices::whereBetween('date',[$from_date, $to_date])->get();

        $data['Invoices'] = $Invoices;
        return view('report.monthlyreport',$data);
    }
    public function viewreport($id){

        $invoice = Invoices::find($id);


        return view('report.reportview')->with('invoice',$invoice);

    }

}
