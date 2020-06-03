@extends('layouts.theme')

@section('headline')
All Customer
@endsection
@section('content')
  <div class="customerlist">
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
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    	<?php $id =1; ?>
    	@foreach($customers as $customer)
      <tr>
        <td>{{$id}}</td>
        <td>{{$customer->customer_name}}</td>
        <td>{{$customer->phone_no}}</td>
        <td>{{$customer->address}}</td>
        <td>{{$customer->gst_no}}</td>
        <td>{{$customer->state}}</td>
        <td><a href="/customer-edit/{{$customer->id}}"><i class="fas fa-edit"></i> <span class="glyphicon glyphicon-edit"></span></a></td>
        <td><a href="/customer/{{$customer->id}}"><i class="fas fa-trash-alt"></i></a></td>
      </tr>
         <?php $id++ ?>
         @endforeach
    </tbody>
  </table>
  </div>
  </div>
@endsection