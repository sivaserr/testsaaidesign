@extends('layouts.theme')

@section('headline')
Day wise report
@endsection
 <style>

.daytable {
    border: 1px solid #dee2e6;
}

.dayreportview {
    margin: 60px 0px!important;
}
 </style>

@section('content')

<?php

   $customers = DB::table('customers')->select('customers.*')->get();
   $invoices = DB::table('invoices')->latest('id')->first();

?>
<div class="dayreportview">

  <form method="POST" action="/day-report">

    {{ csrf_field() }}

    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-4">
   <div class="form-group">
    <label for="exampleInputEmail1">Date</label>
    <input type="date" class="form-control" name="date" id="date" aria-describedby="date">
   </div>       
      </div>
      <div class="col-sm-4">
        <div class="daybutton">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
            <div class="col-sm-2"></div>

    </div>


</form>

</div>




      <div class="table-responsive">
            @if(count($Invoices) > 0)

     <table class="table table-bordered daytable">
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

          <td><a href="view-report/{{$Invoice->id}}"><i class="fas fa-print"></i></a>
          </td>
          </tr>
          <?php $id++;?>

          @endforeach



        </tbody>
      </table>
          @endif

    </div>

@endsection