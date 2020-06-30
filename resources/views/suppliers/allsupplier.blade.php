@extends('layouts.theme')

@section('headline')
All Supplier
@endsection
@section('content')
  <div class="supplierlist">
    <div class="table-responsive reportviewtable ">
  	<table class="table table-bordered">
    <thead>
      <tr>
        <th>S.no</th>
        <th>Name</th>
        <th>Phone no</th>
        <th>Address</th>
        <th>Gst No</th>
        <th>State</th>
        <th>Code</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    	<?php $id =1; ?>
    	@foreach($suppliers as $supplier)
      <tr>
        <td>{{$id}}</td>
        <td>{{$supplier->supplier_name}}</td>
        <td>{{$supplier->phone_no}}</td>
        <td>{{$supplier->address}}</td>
        <td>{{$supplier->gst_no}}</td>
        <td>{{$supplier->state}}</td>
        <td>{{$supplier->code}}</td>
        <td><a href="/supplier-edit/{{$supplier->id}}"><i class="fas fa-edit"></i> <span class="glyphicon glyphicon-edit"></span></a></td>
        <td><a href="/supplier/{{$supplier->id}}"><i class="fas fa-trash-alt"></i></a></td>
      </tr>
         <?php $id++ ?>
         @endforeach
    </tbody>
  </table>
  </div>
  </div>
<!--     <div class="print_btn">
   <a href="customer/pdf">Downlode PDF</a>
</div> -->
@endsection