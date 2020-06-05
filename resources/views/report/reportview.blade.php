@extends('layouts.theme')

@section('headline')
Report view
@endsection
 <style>


.main-panel > .content {
    height: auto!important;
}
.report {
    border: 1px solid #dee2e6;
    padding: 40px;
}
.viewlogo {
    text-align: center;
}
.viewlogo img {
    height: 125px;
}
.reportviewtable thead tr th {
    border: 1px solid #dee2e6!important;
}
.reportviewtable {
    margin: 60px 0px;
}
.grand_total {
    /* float: right; */
    padding: 0px;
    text-align: right;
    padding-right: 20px;
}
.company_account_details,.signature_content{
    border: 1px solid #212529;
}
.grand_total ul li {
    list-style: none;
    padding-bottom: 20px;
}

.declare_details ul,.bank_details ul {
    list-style: none;
    padding: 15px;
}
.signature_content .row {
    margin-right: 0px!important;
    margin-left: 0px!important;
}
.signature_content1 {
    border-right: 1px solid;
}
.customer_sign,.company_sign{
    padding-top: 50px;
    text-align: center;
}
 </style>

@section('content')

<?php
$invoice_products = DB::table('invoice_products')->select('invoice_products.*')->get();
$customers = DB::table('customers')->select('customers.*')->get();
$materials = DB::table('materials')->select('materials.*')->get();

?>

<div class="report">
<div class="viewreport">

<div class="container">
    <div class="purchase_header">
      <h5><b>INVOICE</b></h5>
    </div>

    <div class="from_details">
    <div class="row">
  
  <div class="col-sm-6">
          <h6 class="mb-3">From:</h6>
      <div>Sai Design</div>
      <div>Empire Arcade Opp New Bus Stand,Salem</div>
      <div>GSTIN/UIN:33AWIPJ4592Q1ZU</div>
      <div>State Name: Tamil Nadu,Code:33</div>
  </div>
  <div class="col-sm-6">
    <div class="viewlogo">
      <img src="../assets/img/sailogo1.png">
    </div>
  </div>
</div>  
    </div>


<div class="to_details">
  <div class="row">
  
  <div class="col-sm-6">
          <h6 class="mb-3">To:</h6>
    @foreach($customers as $customer)
    @if($invoice->customer_id === $customer->id)
      <div>{{$customer->customer_name}}</div>
      <div>{{$customer->address}}</div>
      <div>GSTIN/UIN:{{$customer->gst_no}}</div>
      <div>State Name:{{$customer->state}}</div>
      @endif
    @endforeach
  </div>
  <div class="col-sm-6">
  </div>
</div>



</div>

</div>
</div>

      <div class="table-responsive reportviewtable">

<table class="table table-bordered ">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Description</th>
      <th scope="col">Material</th>
      <th scope="col">Sqrft/copies</th>
      <th scope="col">Total(Sq/cp)</th>
      <th scope="col">Qty</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
     @foreach($invoice_products as $invoice_product)
     @if($invoice->id === $invoice_product->invoice_id)
    <tr>
      <th scope="row">1</th>
      <td>{{$invoice_product->description}}</td>
      @foreach($materials as $material)
      @if($material->id == $invoice_product->material_id)
      <td>{{$material->material_name}}</td>
      @endif
      @endforeach
      <td>{{$invoice_product->sqrft_copies}}</td>
      <td>{{$invoice_product->qty}}</td>
      <td>{{$invoice_product->price}}</td>
      <td>{{$invoice_product->netvalue}}</td>
     </tr>
    @endif
   @endforeach


  </tbody>
</table>
</div>
          <div class="grand_total">
            <ul>
              <li>Sub Total:{{$invoice->sub_total}}</li>
              <li>Tax:{{$invoice->tax}}</li>
              <li>Tax Amount:{{$invoice->tax_amount}}</li>
              <li>Grand Total:{{$invoice->total_amount}}</li>
            </ul>
          </div>

      <div class="company_account_details">
   <div class="row">
     <div class="col-sm-6">
       <div class="declare_details">
         <ul>
           <li>
             <span><b>Company's PAN :</b>ADWFS9031L</span>
           </li>
           <li>
             <span><b>Declaration</b></span>
             <p>We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct.</p>
           </li>
         </ul>
       </div>
     </div>
     <div class="col-sm-6">
              <div class="bank_details">
         <ul>
           <li>
             <b>Company's Bank Details</b>
           </li>
             <li><b>Bank Name :</b> Canara Bank</li>
             <li><b>A/c No :</b> 1225201012484</li>
             <li><b>Branch & IFS Code :</b> Alagarapuram & CNRB0001225</li>
         </ul>
       </div>
     </div>
   </div>
</div>


<div class="signature_content">
<div class="row">
  <div class="col-sm-6 signature_content1">
    <div class="customer_sign">
      <span>Customer's Seal and Signature</span>
    </div>
  </div>
  <div class="col-sm-6 signature_content1">
        <div class="company_sign">
            <span>For SAAI PAPERS</span>
            <span>(Authorized signatory)</span>
    </div>
  </div>
</div>
</div>
</div>




@endsection