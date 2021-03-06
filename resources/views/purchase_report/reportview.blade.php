@extends('layouts.theme')

@section('headline')
Purchase Report view
@endsection
 <style>



.main-panel > .content {
    height: auto!important;
}
.entrydetails {
    text-align: right;
    /*padding-top: 20px;*/
    font-size: 16px;
}
 </style>


@section('content')

<?php
$purchase_products = DB::table('purchase_products')->select('purchase_products.*')->get();
$suppliers = DB::table('suppliers')->select('suppliers.*')->get();
$materials = DB::table('materials')->select('materials.*')->get();

?>

<div class="report printcontent">
<div class="border">
<div class="viewreport">

    <div class="purchase_header">
      <h5><b>PURCHASE INVOICE</b></h5>
    </div>

    <div class="from_details">
    <div class="company">
      <div class="company_addresss">
      <h6>From:</h6>
      <div><b>Sai Design</b></div>
      <div>First Floor,Empire Arcade,</div>
      <div>Opp New Bus Stand,Salem-636004.</div>
      <div>GSTIN/UIN : 33AWIPJ4592Q1ZU</div>
      <div>State:Tamilnadu,Code :33 </div>
      <div>Ph : 9944306679,9150366666</div>
      <div>Email : saidesignsalem@gmail.com</div>
      <div>Web : www.saidesignsalem.com</div>
    </div>
      <div class="viewlogo">
      <img src="../assets/img/sailogo1.png">
  </div>
</div>  
    </div>


<div class="to_details">
  <div class="row">
      <div class="col-sm-6">

      <div class="supplier-address">
          <h6 class="customeraddress">To:</h6>
    @foreach($suppliers as $supplier)
    @if($purchase->supplier_id === $supplier->id)
      <div><b>{{$supplier->supplier_name}}</b></div>
      <div>{{$supplier->address}}</div>
      <div>GSTIN/UIN:{{$supplier->gst_no}}</div>
      <div>State : {{$supplier->state}},Code : {{$supplier->code}}</div>
      
      @endif
    @endforeach 
    </div>

  </div>
  <div class="col-sm-6">
    <div class="entrydetails">
    <div><b>Invoice no</b> : {{$purchase->invoice_no}}</div>
    <div><b>Date</b> : {{Carbon\Carbon::parse($purchase->date)->format('d-m-Y')}}</div>
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
      <th scope="col">HSN/SAC</th>
      <th scope="col">Size</th>
      <th scope="col">Qty</th>
      <th scope="col">Total(sq/cp)</th>
      <th scope="col">Price</th>
      <th scope="col">CGST(%)</th>
      <th scope="col">SGST(%)</th>
      <th scope="col">Net-val</th>
      <th scope="col">Tax-Amount</th>
    </tr>
  </thead>
  <tbody>
     <?php $id =1; ?>

     @foreach($purchase_products as $purchase_product)
     @if($purchase->id === $purchase_product->invoice_id)

    <tr>
        <td>{{$id}}</td>
      <td>{{$purchase_product->description}}</td>
      @foreach($materials as $material)
      @if($material->id == $purchase_product->material_id)
      <td>{{$material->material_name}}</td>
      @endif
      @endforeach
      <td>{{$purchase_product->hsn}}</td>
      <td>{{$purchase_product->size}}</td>
      <td>{{$purchase_product->qty}}</td>
      <td>{{$purchase_product->total_sqrft_copies}}</td>
      <td>{{$purchase_product->price}}</td>
      <td>{{$purchase_product->cgst}}</td>
      <td>{{$purchase_product->sgst}}</td>
      <td>{{$purchase_product->netvalue}}</td>
      <td>{{$purchase_product->taxamount}}</td>
     </tr>
                  <?php $id++ ?>

    @endif
   @endforeach


  </tbody>
</table>
</div>
          <div class="grand_total">


  <div class="finaltotal" >
          <div class="gsttable">
      <table class="table table-bordered table-hover " id="tab_logic_total">
        <tbody>
<!--           <tr>
            <th class="text-center">CGST</th>
            <td class="text-center">{{$purchase->total_cgst}}%</td>
          </tr>
          <tr>
            <th class="text-center">SGST</th>
            <td class="text-center">{{$purchase->total_sgst}}%</td>
          </tr>
          <tr>
            <th class="text-center">Total Tax</th>
            <td class="text-center">{{$purchase->total_tax}}%</td>
          </tr> -->
        </tbody>
      </table>
    </div>
    <div class="totaltable">
      <table class="table table-bordered table-hover " id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">Sub Total</th>
            <td class="text-center"><i class="fal fa-rupee-sign">{{$purchase->sub_total}}</td>
          </tr>
          <tr>
            <th class="text-center">Tax Amount</th>
            <td class="text-center"><i class="fal fa-rupee-sign">{{$purchase->tax_amount}}</td>
          </tr>
          <tr>
            <th class="text-center">Grand Total</th>
            <td class="text-center"><i class="fal fa-rupee-sign" id="number">{{$purchase->grand_total}}</i></td>
<!--             <td class="text-center" id="number">1150</td>
 -->          </tr>
        </tbody>
      </table>
    </div>
  </div>
          </div>
  <div class="amountword">
    <h6><b>Amount Chargeable ( in words ) </b></h6>
    <span id="words"></span>

  </div>
      <div class="company_account_details">
       <div class="declare_details">
         <ul>
<!--            <li>
             <span><b>Company's PAN :</b> AWIPJ4592Q </span>
           </li> -->
<!--            <li>
             <span><b>GST No :</b> 33AWIPJ4592Q1ZU</span>
           </li> -->
           <li class="declare">
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
             <li><b>Name : </b> SAI DESIGN</li>
             <li><b>Bank Name : </b> Indian Overseas Bank (IOB)</li>
             <li><b>Account No : </b> 065502000002435</li>
             <li><b>Branch : </b> Leigh Bazaar Branch </li>
             <li><b>IFSC Code :</b> IOBA0000655</li>
         </ul>
       </div>
</div>


<div class="signature_content">
    <div class="customer_sign">
      <span>Customer's Seal And Signature</span>
    </div>
        <div class="company_sign">
            <div class="papers">For SAI DESIGN</div>
            <div class="signatory">(Authorized Signatory)</div>
    </div>
</div>

</div>
<div class="footertext">
<p>This is a Computer Generated Invoice</p>
</div>
</div>

  <div class="print_btn">
   <button type="text" id="print" class="btn btn-primary">Print</button>
</div>


@endsection