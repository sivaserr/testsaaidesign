@extends('layouts.theme')

@section('headline')
Invoice Entry
@endsection
 <style>
  .main-panel > .content {
    height: auto!important;
}
  .invoice_control {
    border: none;
    background: transparent;
}
.invoice_control:focus{
     outline: none;
  }
/*  .form-control {
    display: inline!important;
    width: 50%!important;
}*/
.amountentry .table-responsive {
    display: block;
    width: 100%;
    overflow: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
}
.invoiceentrybutton {
    text-align: center;
}
@media(max-width:768px){
  #tab_logic .form-control{
    width: 150px!important;
    overflow-x: auto!important;

}
}

 </style>

@section('content')

<?php

   $customers = DB::table('customers')->select('customers.*')->get();
   $invoices = DB::table('invoices')->latest('id')->first();

?>

 <form id="invoicedata" action="{{ route('invoice')}} " method="POST">
           {{ csrf_field()}}

<div class="customer_details">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-3"></div>
    <div class="col-sm-3"></div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="name">Date</label>
            <input type="date" class="form-control" name="date" id="date" aria-describedby="date" placeholder="Enter date" required>
          </div>
        </div>
  </div>

       <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="name">Invoice no</label>
          <input type="text" class="form-control" name="invoiceno" id="invoiceno" aria-describedby="name" placeholder="Enter invoice no" value="SAAI/{{$invoices->id+1}}" readonly>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="customer_status">
            <label for="customer">Customer</label>
           <select name="customer" id="customer" class="form-control customer" onchange="customer_details()">
              <option>Choose</option>  
          @foreach($customers as $customer)
              <option value="{{$customer->id}}">{{$customer->customer_name}}-{{$customer->company_name}}</option>
          @endforeach
           </select>
         </div>
        </div>
        <div class="col-sm-4">
                    <div class="form-group">
            <label for="gst">Gst</label>
          <input type="text" class="form-control" name="gst" id="gst" aria-describedby="name" placeholder="Enter gst">
          </div>
        </div>
      </div>



      <div class="row">
        <div class="col-sm-4">
          <div class="customer_status">
            <label for="phone">Phone No</label>
           <input type="text" class="form-control" name="phone" id="phone" aria-describedby="name" placeholder="Enter phone" value="" readonly>
         </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" aria-describedby="address" placeholder="Enter address" required>
              </div>
        </div>
        <div class="col-sm-4">
              <div class="form-group">
                <label for="name">state</label>
                <input type="text" class="form-control" name="state" id="state" aria-describedby="state" placeholder="Enter state" required>
              </div>
        </div>
      </div>

</div>


<div class="amountentry">
  <div class="row clearfix">
    <div class="col-md-12">
      <div class="table-responsive">
      <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          <tr>
            <th class="text-center"> # </th>
            <th class="text-center"> Description</th>
            <th class="text-center"> Product </th>
            <th class="text-center"> sqrft/copies </th>
            <th class="text-center"> Total(sqrft/copies)</th>
            <th class="text-center"> Qty </th>
            <th class="text-center"> Price </th>
            <th class="text-center"> Net-value </th>
          </tr>
        </thead>
        <tbody id="dynamic_product_rows">
          <tr id='addr0'>
            <td>1</td>
            <td><input type="text" name='description' placeholder='description' class="form-control description" /></td>
            <td>
              <select name="material" id="material" class="form-control material" onchange="materialunitfind(this)">
                <option>Choose</option>
              @foreach($materials as $material)
                <option value="{{$material->id}}">{{$material->material_name}}</option>
              @endforeach
              </select>
              </td>
            <td><input type="text" name='sqrft_copies ' id="sqrft_copies"  class="form-control sqrft_copies" step="0" min="0" oninput="sqrft(this)" value="0" /></td>
            <td><input type="number" name='total' id="totals" placeholder='0.00' class="form-control total" step="0" min="0"  value="0" readonly/></td>
            <td><input type="number" name='qty' placeholder='Enter Qty' class="form-control qty" step="0" min="0" /></td>
            <td><input type="number" name='price' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0" oninput="copies(this)"
              /></td>
            <td><input type="number" name='netvalue' placeholder='0.00' class="form-control netvalue" readonly/></td>
          </tr>
          <tr id='addr1'></tr>
        </tbody>
      </table>
    </div>
    </div>
  </div>
  <div class="row clearfix">
    <div class="col-md-12">
      <button id="add_row" class="btn btn-default pull-left">Add Row</button>
      <button id='delete_row' class="pull-right btn btn-default">Delete Row</button>
    </div>
  </div>
  <div class="row clearfix" style="margin-top:20px">
    <div class="col-sm-8"></div>
    <div class="pull-right col-md-4">
      <table class="table table-bordered table-hover" id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">Sub Total</th>
            <td class="text-center"><input type="number" name='sub_total' id="sub_total" placeholder='0.00' class="form-control sub_total" id="sub_total" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Tax</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <input type="number" name='tax' id="tax" class="form-control tax" id="tax" placeholder="0">
                <div class="input-group-addon">%</div>
              </div></td>
          </tr>
          <tr>
            <th class="text-center">Tax Amount</th>
            <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Grand Total</th>
            <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="invoiceentrybutton">
<button type="submit" class="btn btn-primary">Save</button>
</div>
 </form>


@endsection