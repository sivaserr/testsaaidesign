@extends('layouts.theme')


@section('headline')
Customer
@endsection

@section('content')
<div class="customers">
    <form action="{{route('customer')}}" method="POST">
        {{ csrf_field()}}
        <div class="form-group">
            <label for="inputcustomername">Customer Name</label>
            <input type="text" class="form-control" id="customername" name="customername" placeholder="Customer Name" required>
        </div>
        <div class="form-group">
            <label for="inputphoneno">Phone No</label>
            <input type="text" class="form-control" id="phoneno" name="phoneno" placeholder="phoneno" required>
        </div>
        <div class="form-group">
            <label for="inputaddress">Address</label>
            <textarea class="form-control" id="address" name="address" placeholder="Address" ></textarea>
        </div>
        <div class="form-group">
            <label for="inputcompanyname">Company Name</label>
            <input type="text" class="form-control" id="companyname" name="companyname" placeholder="Company Name" required>
        </div>
        <div class="form-group">
            <label for="inputgstno">Gst No</label>
            <input type="text" class="form-control" id="gstno" name="gstno" placeholder="gstno" required>
        </div>
        <div class="form-group">
            <label for="inputstatus">Status</label>
            <input type="text" class="form-control" id="status" name="state" placeholder="state" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection