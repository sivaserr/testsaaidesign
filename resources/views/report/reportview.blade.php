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



/*report content*/
.company,.company_account_details,.signature_content {
    display: flex;
}
.company_addresss,.viewlogo,.declare_details,.bank_details,.customer_sign,.company_sign{
    width: 50%;
    display: inline-block;
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
    border: 1px solid #dee2e6;
    position: relative;
    bottom: 0;
}
.grand_total ul li {
    list-style: none;
    padding-bottom: 20px;
}

.company_account_details {
    margin-top: 100px;
}

.customer_sign {
    border-right: 1px solid #dee2e6;
    padding-top: 50px;
    text-align: center;
}
.company_sign {
    text-align: center;
}
.company_account_details ul {
    list-style: none;
    padding-top: 10px;
}
.declare_details {
    border-right: 1px solid #dee2e6;
}
.papers {
    padding-bottom: 27px;
}

.print_btn {
    text-align: center;
}


.finaltotal {
    display: flex;
}
.gsttable {
    width: 50%;
    display: inline-block;
    margin-right: 20px;
}
.totaltable {
    width: 50%;
    display: inline-block;
    margin-right: -20px;
}
/*.declare_details ul,.bank_details ul {
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
}*/


 </style>


@section('content')

<?php
$invoice_products = DB::table('invoice_products')->select('invoice_products.*')->get();
$customers = DB::table('customers')->select('customers.*')->get();
$materials = DB::table('materials')->select('materials.*')->get();

?>

<div class="report printcontent">
<div class="viewreport">

    <div class="purchase_header">
      <h5><b>INVOICE</b></h5>
    </div>

    <div class="from_details">
    <div class="company">
      <div class="company_addresss">
      <h6 class="mb-3">From:</h6>
      <div>Sai Design</div>
      <div>Empire Arcade Opp New Bus Stand,Salem</div>
      <div>GSTIN/UIN:33AWIPJ4592Q1ZU</div>
      <div>State Name: Tamil Nadu,Code:33</div>
    </div>
      <div class="viewlogo">
      <img src="../assets/img/sailogo1.png">
  </div>
</div>  
    </div>


<div class="to_details">
  <div class="row">
      <div class="customer-address">

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

  </div>
  <div class="col-sm-6">
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
      <th scope="col">Size</th>
      <th scope="col">Sqrft</th>
      <th scope="col">Qty</th>
      <th scope="col">Total(sq/cp)</th>
      <th scope="col">Price</th>
      <th scope="col">CGST(%)</th>
      <th scope="col">SGST(%)</th>
      <th scope="col">Net-val</th>
    </tr>
  </thead>
  <tbody>
     <?php $id =1; ?>

     @foreach($invoice_products as $invoice_product)
     @if($invoice->id === $invoice_product->invoice_id)

    <tr>
        <td>{{$id}}</td>
      <td>{{$invoice_product->description}}</td>
      @foreach($materials as $material)
      @if($material->id == $invoice_product->material_id)
      <td>{{$material->material_name}}</td>
      @endif
      @endforeach
      <td>{{$invoice_product->size}}</td>
      <td>{{$invoice_product->sqrft}}</td>
      <td>{{$invoice_product->qty}}</td>
      <td>{{$invoice_product->total_sqrft_copies}}</td>
      <td>{{$invoice_product->price}}</td>
      <td>{{$invoice_product->cgst}}</td>
      <td>{{$invoice_product->sgst}}</td>
      <td>{{$invoice_product->netvalue}}</td>
     </tr>
                  <?php $id++ ?>

    @endif
   @endforeach


  </tbody>
</table>
</div>
          <div class="grand_total">
<!--             <ul>
              <li>Sub Total:{{$invoice->sub_total}}</li>
              <li>Tax:{{$invoice->tax}}</li>
              <li>Tax Amount:{{$invoice->tax_amount}}</li>
              <li>Grand Total:{{$invoice->total_amount}}</li>
            </ul> -->

  <div class="finaltotal" >
          <div class="gsttable">
      <table class="table table-bordered table-hover " id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">CGST</th>
            <td class="text-center">{{$invoice->total_cgst}}%</td>
          </tr>
          <tr>
            <th class="text-center">SGST</th>
            <td class="text-center">{{$invoice->total_sgst}}%</td>
          </tr>
          <tr>
            <th class="text-center">Total Tax</th>
            <td class="text-center">{{$invoice->total_tax}}%</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="totaltable">
      <table class="table table-bordered table-hover " id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">Sub Total</th>
            <td class="text-center"><i class="fal fa-rupee-sign">{{$invoice->sub_total}}</td>
          </tr>
          <tr>
            <th class="text-center">Tax Amount</th>
            <td class="text-center"><i class="fal fa-rupee-sign">{{$invoice->tax_amount}}</td>
          </tr>
          <tr>
            <th class="text-center">Grand Total</th>
            <td class="text-center"><i class="fal fa-rupee-sign">{{$invoice->grand_total}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>




          </div>

      <div class="company_account_details">
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


<div class="signature_content">
    <div class="customer_sign">
      <span>Customer's Seal and Signature</span>
    </div>
        <div class="company_sign">
            <div class="papers">For SAAI PAPERS</div>
            <div class="signatory">(Authorized signatory)</div>
    </div>
</div>

</div>
  <div class="print_btn">
   <button type="text" id="print" class="btn btn-primary">Print</button>
</div>


@endsection