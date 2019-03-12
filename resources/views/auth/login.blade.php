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
<link href="assets/backend/img/favicon.png" rel="icon">
<link href="assets/backend/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Bootstrap core CSS -->
<link href="assets/backend/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--external css-->
<link href="assets/backend/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="assets/backend/css/style.css" rel="stylesheet">
<link href="assets/backend/css/style-responsive.css" rel="stylesheet">

<!-- =======================================================
  Template Name: Dashio
  Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
  Author: TemplateMag.com
  License: https://templatemag.com/license/
======================================================= -->
</head>

<body>
    <div class="panel-body">
                <div id="login-page">
                    <div class="container">
                        <form method="POST" class="form-login" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @csrf
                            <h2 class="form-login-heading">sign in now</h2>
                            <div class="login-wrap">
                                <input id="email" type="email" style="width:300px;" class="form-control form-control-inline input-medium{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Username Or E-mail" required autofocus autocomplete='off'>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            <br>
                                <input id="password" type="password" placeholder="Password" style="width:300px;" class="form-control form-control-inline input-medium{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <br>
                                
                                <button type="submit" class="btn btn-theme btn-block"><i class="fa fa-lock"></i>
                                    {{ __('Login') }}
                                </button>
                            <br>
                                <a class="btn btn-link center" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                
                            </div>
                        </form>
                </div>
    </div>
  <script src="assets/backend/lib/jquery/jquery.min.js"></script>
  <script src="assets/backend/lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="assets/backend/lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("assets/backend/img/login-custom-bg1.png", {
      speed: 500
    });
  </script>
</body>

</html>
