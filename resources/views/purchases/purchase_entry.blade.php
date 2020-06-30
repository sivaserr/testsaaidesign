@extends('layouts.theme')

@section('headline')
Purchase Entry
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

   $suppliers = DB::table('suppliers')->select('suppliers.*')->get();
   $materials = DB::table('materials')->select('materials.*')->get();
   $purchases = DB::table('purchases')->latest('id')->first();
?>

<form id="purchasedata" action="{{ route('purchase')}} " method="POST">
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
          <input type="text" class="form-control" name="invoiceno" id="invoiceno" aria-describedby="name" placeholder="Enter invoice no" value="SAAI/{{$purchases->id+1}}" readonly>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="supplier_status">
            <label for="supplier">Supplier</label>
           <select name="supplier" id="supplier" class="form-control supplier" onchange="supplier_details()">
              <option>Choose</option>  
          @foreach($suppliers as $supplier)
        <option value="{{$supplier->id}}">{{$supplier->supplier_name}}-{{$supplier->company_name}}</option>
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
            <th class="text-center"> S.No </th>
            <th class="text-center"> Description</th>
            <th class="text-center"> Product </th>
            <th class="text-center"> HSN/SAC</th>
            <th class="text-center"> Size</th>
            <th class="text-center"> Qty </th>
            <th class="text-center"> Total(sq/cp)</th>
            <th class="text-center"> Price </th>
            <th class="text-center"> CGST(%) </th>
            <th class="text-center"> SGST(%) </th>
            <th class="text-center"> Net-value </th>
            <th class="text-center"> Tax-Amount </th>
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
            <td style="display: none"><input type="text" name="units_id" class="units_id"></td>
            <td><input type="number" name='hsn' id="hsn" placeholder='0.00' class="form-control hsn" step="0" min="0"  value="0" readonly/></td>
            <td><input type="text" name='size ' id="size"  class="form-control size" step="0" min="0" value="0" /></td>
            <td><input type="number" name='qty' placeholder='Enter Qty' class="form-control qty" step="0" min="0" oninput="copies(this)"/></td>
            <td><input type="number" name='total' id="totals"  class="form-control total" step="0" min="0"  value="0" readonly/></td>
            <td><input type="text" name='price' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0" oninput="pricecalculation(this)"/></td>
            <td><input type="text" name='cgst' id="cgst" placeholder='0.00' class="form-control cgst" value="0"readonly/></td>
            <td><input type="text" name='sgst' placeholder='0.00' class="form-control sgst" value="0" readonly/></td>

            <td><input type="text" name='netvalue' placeholder='0.00' class="form-control netvalue" value="0" readonly/></td>
            <td><input type="text" name='rowtaxamount' placeholder='0.00' id="rowtaxamount" class="form-control rowtaxamount" value="0"  readonly/></td>
          </tr>
          <tr id='addr1'></tr>
        </tbody>
      </table>
    </div>
    </div>
  </div>
  <div class="row clearfix">
    <div class="col-md-12">
      <a href="#" id="add_rowpurchase" class="btn btn-default pull-left">Add Row</a>
      <a href="#" id='delete_rowpurchase' class="pull-right btn btn-default">Delete Row</a>
    </div>
  </div>
  <div class="row clearfix" style="margin-top:20px">
    <div class="col-sm-8">
<!--           <div class="pull-left">
      <table class="table table-bordered table-hover" id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">CGST</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <input type="number" name='totalcgst'  class="form-control totalcgst" id="totalcgst" placeholder="0" readonly>
                <div class="input-group-addon">%</div>
              </div></td>
          </tr>
          <tr>
            <th class="text-center">SGST</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <input type="number" name='totalsgst' class="form-control totalsgst" id="totalsgst" placeholder="0" readonly>
                <div class="input-group-addon">%</div>
              </div></td>
          </tr>
          <tr>
            <th class="text-center">Total Tax</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
              <input type="number" name='tax' id="tax" placeholder='0.00' class="form-control" readonly/>
            <div class="input-group-addon">%</div>
            </td>
          </tr>
        </tbody>
      </table>
    </div> -->
    </div>
    <div class="pull-right col-md-4">
      <table class="table table-bordered table-hover" id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">Sub Total</th>
            <td class="text-center"><input type="number" name='sub_total' id="sub_total" placeholder='0.00' class="form-control sub_total" id="sub_total" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Tax Amount</th>
            <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Grand Total</th>
            <td class="text-center"><input type="number" name='grand_total' id="grand_total" placeholder='0.00' class="form-control" readonly/></td>
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