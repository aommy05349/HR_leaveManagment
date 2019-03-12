<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>SANDEE TOWN</title>

  <!-- Favicons -->
  <link href="{{ URL::asset('assets/backend/img/sandee.jpg') }}" rel="icon" >
  <link href="{{ URL::asset('assets/backend/img/apple-touch-icon.png') }}" rel="apple-touch-icon" >
  <link href="{{ URL::asset('assets/backend/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >
  <link href="{{ URL::asset('assets/backend/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" >
  <link href="{{ URL::asset('assets/backend/css/style.css') }}" rel="stylesheet" >
  <link href="{{ URL::asset('assets/backend/css/style-responsive.css') }}" rel="stylesheet" >

  {{-- <link href="assets/backend/img/favicon.png" rel="icon">
  <link href="assets/backend/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="assets/backend/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="assets/backend/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="assets/backend/css/style.css" rel="stylesheet">
  <link href="assets/backend/css/style-responsive.css" rel="stylesheet"> --}}

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>
<body>
    <section id="container">
        @include('layouts.nav')
        @yield('content')
        @include('layouts.footer')
    </section>
        <!-- js placed at the end of the document so the pages load faster -->
   
    <script src=" {{ asset('assets/backend/lib/jquery/jquery.min.js') }}" ></script>
    <script src=" {{ asset('assets/backend/lib/bootstrap/js/bootstrap.min.js') }}" ></script>
    <script src=" {{ asset('assets/backend/lib/jquery-ui-1.9.2.custom.min.js') }}" ></script>
    <script src=" {{ asset('assets/backend/lib/jquery.ui.touch-punch.min.js') }}" src="assets/backend/lib/jquery.ui.touch-punch.min.js"></script>
    <script src=" {{ asset('assets/backend/lib/jquery.dcjqaccordion.2.7.js') }}" src="assets/backend/lib/jquery.dcjqaccordion.2.7.js" class="include" type="text/javascript" ></script>
    <script src=" {{ asset('assets/backend/lib/jquery.scrollTo.min.js') }}" ></script>
    <script src=" {{ asset('assets/backend/lib/jquery.nicescroll.js') }}"  type="text/javascript"></script>
    <!--common script for all pages-->
    <script src=" {{ asset('assets/backend/lib/common-scripts.js') }}" ></script>
    
    <!--script for this page-->
      
</body>
      
</html>