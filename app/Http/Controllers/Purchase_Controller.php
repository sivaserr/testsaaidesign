<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materials;
use App\Purchases;
use App\Purchase_products;
use DB;
class Purchase_Controller extends Controller
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
        return view('purchases.purchase_entry');
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
        $purchase = new Purchases();

        $purchase->invoice_no = $request->input('invoiceno');
        $purchase->supplier_id = $request->input('supplier');
        $purchase->date = $request->input('date');
        $purchase->sub_total = $request->input('sub_total');
        // $purchase->total_cgst = $request->input('totalcgst');
        // $purchase->total_sgst = $request->input('totalsgst');
        // $purchase->total_tax = $request->input('tax');
        $purchase->tax_amount = $request->input('tax_amount');
        $purchase->grand_total = $request->input('grand_total');


        $purchaseproducts = $request->input('purchaseproduct_datas');

        if($purchase->save()){

            foreach ($purchaseproducts as $purchaseproduct) {
        $purchase_products = new Purchase_products();
        $purchase_products->invoice_id =$purchase->id ;
        $purchase_products->description = $purchaseproduct['description'];
        $purchase_products->material_id = $purchaseproduct['material'];
        $purchase_products->hsn = $purchaseproduct['hsn'];
        $purchase_products->size = $purchaseproduct['size'];
        $purchase_products->qty = $purchaseproduct['qty'];
        $purchase_products->total_sqrft_copies = $purchaseproduct['total'];
        $purchase_products->price = $purchaseproduct['price'];
        $purchase_products->cgst = $purchaseproduct['cgst'];
        $purchase_products->sgst = $purchaseproduct['sgst'];
        $purchase_products->netvalue = $purchaseproduct['netvalue'];
        $purchase_products->taxamount = $purchaseproduct['rowtaxamount'];
        $purchase_products->save();
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

   public function filterdata(Request $request){

        $Purchases = Purchases::where([ ['date','=',$request->date]  ])->get();

        $data['Purchases'] = $Purchases;
       return view('purchase_report.dayreport',$data);
   }

    public function filtermonthly(Request $request){
        $from_date = $request->fromdate;
        $to_date = $request->todate;

        $Purchases = Purchases::whereBetween('date',[$from_date, $to_date])->get();

        $data['Purchases'] = $Purchases;
        return view('purchase_report.monthlyreport',$data);
    }
    public function viewreport($id){

        $purchase = Purchases::find($id);


        return view('purchase_report.reportview')->with('purchase',$purchase);

    }


}
