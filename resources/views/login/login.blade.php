<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Human Resource Managment</title>
  
  <link rel="stylesheet" href="{{ url('css/materialdesignicons.css') }}" />     
    <link rel="stylesheet" href="{{ url('css/font-awesome.css') }}"  />     
    <link rel="stylesheet" href="{{ url('css/vendor.bundle.addons.css') }}"  />     
    <link rel="stylesheet" href="{{ url('css/vendor.bundle.base.css') }}"  />     
    <link rel="stylesheet" href="{{ url('css/style.css') }}"  />     
    {{-- <link rel="stylesheet" href="{{ url('css/styles1.css') }}"  />      --}}
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
</head>

<body>
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-5 mx-auto">
            <div class="auto-form-wrapper">
              <form action="{{ url('login') }}" method="POST" autocomplete="off" class="login-form">
                    @csrf
                    <h2 class="login-head font-weight-bold">
                        <i class="fa fa-key "></i>
                        <strong>Login</strong>
                        <br><br>
                    </h2>
                        
                        <div class="form-group row {{ $errors->has('email') || $errors->has('username') ? 'has-error' : '' }}">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Or Username') }}</label>

                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            @if ($errors->has('username'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('password') ? ' is-invalid has-error' : '' }}">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required autofocus>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>     
                    <br><br>
                    <div class="form-group btn-container">
                        <button class="btn btn-primary btn-block">
                            <i class="fa fa-sign-in "></i>
                            Sign in
                        </button>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        
                        <a href="{{ url('password/reset') }}"> Forget  Password </a>
                    </div>
              </form>
            </div>
            <ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul>
            <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>


  
  
</body>

</html>