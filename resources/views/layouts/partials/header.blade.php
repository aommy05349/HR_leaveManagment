<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">

       
          <a class="navbar-brand brand-logo" href="{{ url('/') }}">
                <img src="{{ url('images/logo.svg') }}" alt="logo" />
          </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
         
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-none d-xl-inline-block">
                <span class="profile-text">Hello,{{ Auth::user()->nick_name }} !</span>
                <img class="img-xs rounded-circle" src="{{ Auth::user()->getFirstMediaUrl('avatar') != null ? Auth::user()->getFirstMediaUrl('avatar') : asset('images/noimage.png') }}" alt="Profile image" /> 
            </li >
            
        </div>
      </nav>