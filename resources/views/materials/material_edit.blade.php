@extends('layouts.theme')

@section('headline')
Material Edit
@endsection
@section('content')
<?php

   $units = DB::table('units')->select('units.*')->get();
?>
<div class="material">
    <form action="/material-update/{{$material->id}}" method="POST">
                {{ csrf_field()}}
                {{ method_field('PUT')}}

        <div class="form-group">
            <label for="inputproductname">Product Name</label>
            <input type="text" class="form-control" id="productname" name="productname" value="{{$material->material_name}}">
        </div>
        <div class="form-group">
            <label for="inputcode">HSN/SAC Code</label>
            <input type="text" class="form-control" id="code" name="code" value="{{$material->hsn_code}}">
        </div>
        <div class="units">
        <label for="inputunit">Unit</label>
        <select name="unit" id="unit" class="form-control">
            <option>{{$material->unit}}</option>
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