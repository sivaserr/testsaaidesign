@extends('layouts.theme')


@section('headline')
Customer edit
@endsection

@section('content')
<div class="customers">
    <form action="/customer-update/{{$customer->id}}" method="POST">
        {{ csrf_field()}}
        {{ method_field('PUT')}}
        <div class="form-group">
            <label for="inputcustomername">Customer Name</label>
            <input type="text" class="form-control" id="customername" name="customername" value="{{$customer->customer_name}}">
        </div>
        <div class="form-group">
            <label for="inputphoneno">Phone No</label>
            <input type="text" class="form-control" id="phoneno" name="phoneno" value="{{$customer->phone_no}}">
        </div>
        <div class="form-group">
            <label for="inputaddress">Address</label>
            <textarea class="form-control" id="address" name="address">{{$customer->address}}</textarea>
        </div>
        <div class="form-group">
            <label for="inputcompanyname">Company Name</label>
            <input type="text" class="form-control" id="companyname" name="companyname" value="{{$customer->company_name}}">
        </div>
        <div class="form-group">
            <label for="inputgstno">Gst No</label>
            <input type="text" class="form-control" id="gstno" name="gstno" value="{{$customer->gst_no}}">
        </div>
        <div class="form-group">
            <label for="inputstatus">Status</label>
            <input type="text" class="form-control" id="status" name="state" value="{{$customer->state}}">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection