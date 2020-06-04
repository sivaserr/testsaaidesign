@extends('layouts.theme')

@section('title')
  Sai Design
@endsection
@section('headline')
Dashboard
@endsection
@section('content')
<?php 
  $customer = DB::table('customers')->select('customers.id')->count();
  $material = DB::table('materials')->select('materials.id')->count();
  $revenue = DB::table('invoices')->sum('invoices.total_amount');
  //var_dump($invoices);exit;

?>
      <!-- End Navbar -->
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fas fa-users text-warning"></i>
<!--                       <i class="nc-icon nc-globe text-warning"></i> -->
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Customers</p>
                      <p class="card-title">{{$customer}}<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Update Now
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-tile-56 text-success"></i>
                     <!--  <i class="nc-icon nc-money-coins text-success"></i> -->
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Materials</p>
                      <p class="card-title">{{$material}}<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-calendar-o"></i>
                  Last day
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                     <i class="nc-icon nc-money-coins text-danger"></i>    
               <!--        <i class="nc-icon nc-vector text-danger"></i> -->
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Revenue</p>
                      <p class="card-title"><i class="fal fa-rupee-sign"></i>{{$revenue}}<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-clock-o"></i>
                  In the last hour
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fas fa-receipt text-primary"></i>
<!--                       <i class="nc-icon nc-favourite-28 text-primary"></i> -->
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Invoices</p>
                      <p class="card-title">+45K<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Update now
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection