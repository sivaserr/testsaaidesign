<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
<!--     <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
      <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/custome.css') }}" rel="stylesheet">
          
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

<style>
.active {
    color: #bfd630!important;
}
.active i{
    color: #bfd630!important;
}
</style>

</head>
<body>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/sailogo1.png">
          </div>
        </a>
        <a href="/dashboard" class="simple-text logo-normal">
          Sai Design
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li >
            <a href="/dashboard">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="#" id="main" onclick="suppliermenu()">
              <i class="nc-icon nc-single-02"></i>
              <p>Suppliers</p>
            </a>
            <div id="subsupplier" class="collapse">
                <ul>
          <li  >
            <a href="/supplier">
              <i class="fal fa-user-plus"></i>
              <p>Add Supplier</p>
            </a>
          </li>
          <li  >
            <a href="/all-supplier">
              <i class="fal fa-users"></i>
              <p>All Supplier</p>
            </a>
          </li>
                </ul>
              </div>
          </li>

          <li>
            <a href="#" onclick="customermenu()">
              <i class="nc-icon nc-single-02"></i>
              <p>Customer</p>
            </a>
            <div id="subcustomer" class="collapse">
                <ul>
          <li >
            <a href="/customer">
              <i class="fal fa-user-plus"></i>
              <p>Add Customer</p>
            </a>
          </li>
          <li >
            <a href="/all-customer">
              <i class="fal fa-users"></i>
              <p>All Customer</p>
            </a>
          </li>
                </ul>
              </div>
          </li>


          <li>
            <a href="#" onclick="materialmenu()">
              <i class="nc-icon nc-single-02"></i>
              <p>Material</p>
            </a>
            <div id="submaterial" class="collapse">
                <ul>
          <li >
            <a href="/material">
              <i class="nc-icon nc-tile-56"></i>
              <p>Add Material</p>
            </a>
          </li>
          <li >
            <a href="/all-material">
              <i class="nc-icon nc-tile-56"></i>
              <p>All Material</p>
            </a>
          </li>
                </ul>
              </div>
          </li>



          <li >
            <a href="/purchase-entery">
              <i class="fal fa-database"></i>
              <p>Purchase Entry</p>
            </a>
          </li>
          <li >
            <a href="/invoice-entery">
              <i class="fal fa-database"></i>
              <p>Invoice Entry</p>
            </a>
          </li>

          <li>
            <a href="#" onclick="invoicemenu()">
              <i class="fal fa-receipt"></i>
              <p>Purchase Report</p>
            </a>
            <div id="subinvoicereport" class="collapse">
                <ul>
                  <li >
            <a href="/dayreport">
              <i class="fal fa-receipt"></i>
              <p>Day Report</p>
            </a>
                  </li>
                  <li >
            <a href="/monthlyreport">
              <i class="fal fa-receipt"></i>
              <p>Monthly Report</p>
            </a>
                  </li>
                </ul>
              </div>
          </li>

          <li>
            <a href="#" onclick="purchasemenu()">
              <i class="fal fa-receipt"></i>
              <p>Invoice Report</p>
            </a>
            <div id="subpurchasereport" class="collapse">
                <ul>
                  <li>
            <a href="/day-report">
              <i class="fal fa-receipt"></i>
              <p>Day Report</p>
            </a>
                  </li>
                  <li >
            <a href="/monthly-report">
              <i class="fal fa-receipt"></i>
              <p>Monthly Report</p>
            </a>
                  </li>
                </ul>
              </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
      <div id="sidebar-btn">
     <span></span>
     <span></span>
     <span></span>
     </div>
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">@yield('headline')</a>
          </div>
          <button class="navbar-toggler" type="button"  aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" onclick="loginmenu()">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
<!--             <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form> -->
            <ul class="navbar-nav">

              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} 
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('password.change') }}">
                          <i class="fas fa-key"></i>
                          {{ __('Change password') }}
                      </a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-out-alt"></i>
                          {{ __('Logout') }}
                      </a>
                    
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>



                  </div>
              </li>

            </ul>
          </div>
        </div>
      </nav>
      <div class="content">
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
@endif

@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger">
<li>{{$error}}</li>
</div>
@endforeach
@endif
   @yield('content')

</div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Ivisual
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>




  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
 <!--  <script src="../assets/js/plugins/bootstrap-notify.js"></script> -->
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/invoice.js') }}" defer></script>
  <script src="{{ asset('js/customescript.js') }}" defer></script>
  <script src="{{ asset('js/purchase.js') }}" defer></script>
  <script src="{{ asset('js/printThis.js') }}" defer></script>



  <script type="text/javascript">
    //$(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      //demo.initChartsPages();
    //});
$(function() {
  $('.nav a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
 
});
suppliermenu = ()=>{
  $("#subsupplier").collapse('toggle');
}
customermenu =()=>{
    $("#subcustomer").collapse('toggle');
}
materialmenu =()=>{
    $("#submaterial").collapse('toggle');
}
invoicemenu =()=>{
    $("#subinvoicereport").collapse('toggle');
}
purchasemenu =()=>{
    $("#subpurchasereport").collapse('toggle');
}
loginmenu = () =>{
  $("#navigation").collapse('toggle');
}
$(document).ready(function(){
  let active = document.getElementsByClassName("active")[0];
  let parentNodes = active.parentNode.parentNode.parentNode;
  parentNodes.classList.add("show")

// removeshow =()=>{
//   let togglemenu = document.getElementById('subsupplier');
//   let main = document.getElementById('main');
//   if(togglemenu.classList.contains("show")){

//   }
 
// // console.log(togglemenu.classList[1]);
// //   if(togglemenu.classList[1]){
// //    //togglemenu.classList.remove("collapse");
// //     // togglemenu.classList.remove('show');
// //     // main.classList.add('collapsed');
// //     console.log("fasle");
// //   }else{
// //     //togglemenu.classList.add("show");
// //     console.log("true")
// //   }
// }


});

  </script>
</body>
</html>
