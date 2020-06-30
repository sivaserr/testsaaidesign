@extends('layouts.theme')


@section('headline')
Supplier edit
@endsection

@section('content')
<div class="supplier">
    <form action="/supplier-update/{{$supplier->id}}" method="POST">
        {{ csrf_field()}}
        {{ method_field('PUT')}}
        <div class="form-group">
            <label for="inputsuppliername">Supplier Name</label>
            <input type="text" class="form-control" id="suppliername" name="suppliername" value="{{$supplier->supplier_name}}">
        </div>
        <div class="form-group">
            <label for="inputphoneno">Phone No</label>
            <input type="text" class="form-control" id="phoneno" name="phoneno" value="{{$supplier->phone_no}}">
        </div>
        <div class="form-group">
            <label for="inputaddress">Address</label>
            <textarea class="form-control" id="address" name="address">{{$supplier->address}}</textarea>
        </div>
        <div class="form-group">
            <label for="inputcompanyname">Company Name</label>
            <input type="text" class="form-control" id="companyname" name="companyname" value="{{$supplier->company_name}}">
        </div>
        <div class="form-group">
            <label for="inputgstno">Gst No</label>
            <input type="text" class="form-control" id="gstno" name="gstno" value="{{$supplier->gst_no}}">
        </div>
        <div class="form-group">
            <label for="inputstatus">Status</label>
            <input type="text" class="form-control" id="status" name="state" value="{{$supplier->state}}">
        </div>
        <div class="form-group">
            <label for="inputcode">Code</label>
            <input type="text" class="form-control" id="code" name="code" value="{{$supplier->code}}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection