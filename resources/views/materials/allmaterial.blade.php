@extends('layouts.theme')

@section('headline')
All Materials
@endsection
@section('content')
<?php 
  $units = DB::table('units')->select('units.*')->get();
?>
  <div class="customerlist">
        <div class="table-responsive ">

  	<table class="table table-bordered">
    <thead>
      <tr>
        <th>S.no</th>
        <th>Material Name</th>
        <th>Hsn Code</th>
        <th>Unit</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    	<?php $id =1; ?>
    	@foreach($materials as $material)
      <tr>
        <td>{{$id}}</td>
        <td>{{$material->material_name}}</td>
        <td>{{$material->hsn_code}}</td>
        @foreach($units as $unit)
        @if($material->unit === $unit->id)
        <td>{{$unit->unit_name}}</td>
        @endif
        @endforeach
        <td><a href="/material-edit/{{$material->id}}"><i class="fas fa-edit"></i> <span class="glyphicon glyphicon-edit"></span></a></td>
        <td><a href="/material/{{$material->id}}"><i class="fas fa-trash-alt"></i></a></td>
      </tr>
         <?php $id++ ?>
         @endforeach
    </tbody>
  </table>
</div>
  </div>
@endsection