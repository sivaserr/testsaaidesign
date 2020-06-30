<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suppliers;
use App\Http\Requests\Supplierformvalidation;

class Supplier_Controller extends Controller
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
        return view('suppliers.supplier');
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
    public function store(Supplierformvalidation $request)
    {
        // $request->validate([
        //  'gst_no' => 'required|unique:customers',
        // ]);


        $supplier = new Suppliers();

        $supplier->supplier_name = $request->input('suppliername');
        $supplier->phone_no = $request->input('phoneno');
        $supplier->address = $request->input('address');
        $supplier->company_name = $request->input('companyname');
        $supplier->gst_no = $request->input('suppliergstno');
        $supplier->state = $request->input('state');
        $supplier->code = $request->input('code');

        $supplier->save();
        
        return redirect()->back()->with('message', 'New supplier added!'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $suppliers = Suppliers::all();

        return view('suppliers.allsupplier')->with('suppliers',$suppliers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Suppliers::find($id);

        return view('supplier.supplier_edit')->with('supplier',$supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Supplierformvalidation $request, $id)
    {
        $suppliers = Suppliers::find($id);

        $suppliers->supplier_name = $request->input('suppliername');
        $suppliers->phone_no = $request->input('phoneno');
        $suppliers->address = $request->input('address');
        $suppliers->company_name = $request->input('companyname');
        $suppliers->gst_no = $request->input('suppliergstno');
        $suppliers->state = $request->input('state');
        $suppliers->code = $request->input('code');

        $suppliers->save();
        
        return redirect('/all-supplier')->with('message', 'New supplier Updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Suppliers::find($id);

        $supplier->delete();

        return redirect('/all-supplier')->with('message', 'supplier deleted!'); 

    }
    public function getsupplier($id){
        
        $supplier = Suppliers::find($id);

        return response()->json($supplier);
    }
}
