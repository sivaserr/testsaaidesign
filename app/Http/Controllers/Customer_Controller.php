<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\formvalidation;
use App\Customers;

class Customer_Controller extends Controller
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
        return view('customers.customer');
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
    public function store(formvalidation  $request)
    {
        // $request->validate([
        //  'gst_no' => 'required|unique:customers',
        // ]);


        $customers = new Customers();

        $customers->customer_name = $request->input('customername');
        $customers->phone_no = $request->input('phoneno');
        $customers->address = $request->input('address');
        $customers->company_name = $request->input('companyname');
        $customers->gst_no = $request->input('gstno');
        $customers->state = $request->input('state');
        $customers->code = $request->input('code');

        $customers->save();
        
        return redirect()->back()->with('message', 'New customer added!'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $customers = Customers::all();

        return view('customers.allcustomer')->with('customers',$customers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customers::find($id);

        return view('customers.customer_edit')->with('customer',$customer);
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
        $customers = Customers::find($id);

        $customers->customer_name = $request->input('customername');
        $customers->phone_no = $request->input('phoneno');
        $customers->address = $request->input('address');
        $customers->company_name = $request->input('companyname');
        $customers->gst_no = $request->input('gstno');
        $customers->state = $request->input('state');
        $customers->code = $request->input('code');

        $customers->save();
        
        return redirect('/all-customer')->with('message', 'New customer Updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customers::find($id);

        $customer->delete();

        return redirect('/all-customer')->with('message', 'customer deleted!'); 

    }
    public function getcustomer($id){
        
        $customer = Customers::find($id);

        return response()->json($customer);
    }
}
