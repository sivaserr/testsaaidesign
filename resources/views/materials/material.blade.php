@extends('layouts.theme')

@section('headline')
Material
@endsection
@section('content')
<?php

   $units = DB::table('units')->select('units.*')->get();
?>
<div class="material">
    <form action="{{route('material')}}" method="POST">
                {{ csrf_field()}}

        <div class="form-group">
            <label for="inputproductname">Product Name</label>
            <input type="text" class="form-control" id="productname" name="productname" placeholder="Product Name" required>
        </div>
        <div class="form-group">
            <label for="inputcode">HSN/SAC Code</label>
            <input type="text" class="form-control" id="code" name="code" placeholder="HSN/SAC code" required>
        </div>
        <div class="units">
        <label for="inputunit">Unit</label>
        <select name="unit" id="unit" class="form-control">
            <option>Choose</option>
              @foreach($units as $unit)
                <option value="{{$unit->id}}">{{$unit->unit_name}}</option>
              @endforeach
              </select>
          </div>
<!--         <div class="form-group">
            <label for="inputtax">Tax</label>
            <input class="form-control" id="tax" name="tax" placeholder="Tax" ></input>
        </div> -->

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection