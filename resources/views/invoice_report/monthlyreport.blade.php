@extends('layouts.theme')

@section('headline')
Monthly wise report
@endsection
 <style>
  .main-panel > .content {
    height: auto!important;
}
.monthlytable {
    border: 1px solid #dee2e6;
}
 </style>

@section('content')

<?php

   $customers = DB::table('customers')->select('customers.*')->get();
   $invoices = DB::table('invoices')->latest('id')->first();

?>

<form method="POST" action="/monthly-report">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-sm-4">
        <div class="form-group filterdate">
            <label for="fromDate">From Date</label>
            <input type="Date" class="form-control" id="fromDate" name="fromdate" value="">
          </div>
    </div>
      <div class="col-sm-4">
        <div class="form-group filterdate">
            <label for="toDate">To Date</label>
            <input type="Date" class="form-control" id="toDate" name="todate" value="">
          </div>
    </div>
    <div class="col-sm-4">
        <div class="daybutton">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
  </div>


</form>


      <div class="table-responsive">
            @if(count($Invoices) > 0)

     <table class="table table-bordered monthlytable">
        <thead>
          <tr>
            <th scope="col">S.No</th>
            <th scope="col">Invoie no</th>
            <th scope="col">Date</th>
            <th scope="col">Customer</th>
            <th scope="col">Sub Total</th>
            <th scope="col">Tax</th>
            <th scope="col">Total Amount</th>
            <th scope="col">View</th>
          </tr>
        </thead>
        <tbody>
          <?php $id = 1?>
            @foreach($Invoices as $Invoice)

          <tr>
          <th scope="row">{{$id}}</th>
            <td>{{$Invoice->invoice_no}}</td>
            <td>{{Carbon\Carbon::parse($Invoice->date)->format('d-m-Y')}}</td>
            @foreach($customers as $customer)
            @if($customer->id === $Invoice->customer_id)
            <td>{{$customer->customer_name}}</td>
            @endif
            @endforeach
            <td>{{$Invoice->sub_total}}</td>
            <td>{{$Invoice->tax_amount}}</td>
            <td>{{$Invoice->grand_total}}</td>

          <td><a href="/view-report/{{$Invoice->id}}" ><i class="fas fa-print"></i></a>
          </td>
          </tr>
          <?php $id++;?>

          @endforeach



        </tbody>
      </table>
          @endif

</div>

@endsection